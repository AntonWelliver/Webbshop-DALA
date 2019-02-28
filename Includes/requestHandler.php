<?php
require_once('databaseClass.php');
class requestHandler {
    private $connection;
    private $database;
    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }
    function handleRequest($requestType) {
        if ($requestType == 'registerUser') {
            // handle adding user to the database
            $email = $_POST['email'];
            $pass = $_POST['password'];
            // save user with prepare statenents
            $stmt = $this->connection->prepare("INSERT INTO Account (Email, Password) VALUES (:email, :pass)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
        }
        return  $requestType;
    }

    function testDatabase() { // displays all data in admin
        $stmt = $this->connection->query("SELECT * FROM admin");
        $data = $stmt->fetch();
        return var_dump($data);
    }
}

if (isset($_POST['requestType'])) {
    $handler = new requestHandler();
    $requestType = $_POST['requestType'];
    $handler->handleRequest($requestType);

}

?>