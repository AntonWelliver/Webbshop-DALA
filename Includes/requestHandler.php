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
            $name = $_POST['email'];
            $name = $_POST['password'];
            // save user with prepare statenents
            $stmt = $this->connection->prepare("INSERT INTO Account (Username, Password) VALUES (:user, :email)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':value', $value);
            $stmt->execute();
        }
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
    $handler.handleRequest($requestType);

}

?>