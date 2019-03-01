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
        // Get input value of form from AJAX
        $email = $_POST['email'];
        $pass = $_POST['password'];

        //Now, we need to check if the supplied email already exists.


        if ($requestType == 'registerUser') {


            $sql = "SELECT COUNT(Email) AS num FROM Account WHERE Email = :email";
            $statement = $this->connection->prepare($sql);

            $statement->bindParam(':email', $email);
            
            $statement->execute();

            $numOfEmails = $stmt->fetch(PDO::FETCH_ASSOC);

            if($numOfEmails['num'] > 0) {
                die('That username already exists!');
            } else {
                // save user with prepare statenents
                $statement = $this->connection->prepare("INSERT INTO Account (Email, Password) VALUES (:email, :pass)");
                $statement->bindParam(':email', $email);
                $statement->bindParam(':pass', $pass);
                $statement->execute();
            }
            
            
        } else if ($requestType == 'login') {
            $statement = $this->connection->prepare("SELECT Email, Password FROM Account VALUES (:email, :pass");
            $statement->bindParam(':email', $email);
            $statement->bindParam(':pass', $pass);
            $statement->execute();
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