<?php
require_once('../includes/databaseClass.php');

class userHandler {

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

}
    try {
        if (isset($_POST['requestType'])) {
            $handler = new userHandler();
            $requestType = $_POST['requestType'];
            $handler->handleRequest($requestType);
        }
    } catch(EXCEPTION $err) {
        console.log($err);
    }


?>