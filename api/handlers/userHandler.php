<?php
require_once('../../includes/databaseClass.php');

class userHandler {

    private $connection;
    private $database;

    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }


    function register($email,$password) {
        try {
            $sql = "SELECT COUNT(Email) AS num FROM account WHERE Email = :email";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();

            $emailExists = $statement->fetch(PDO::FETCH_ASSOC);

            if($emailExists['num'] > 0) {
                $response_array['status'] = 'error'; 
                 
                header('Content-type: application/json');
                echo json_encode($response_array);  
            } else {
                // save user with prepare statenents
                $statement = $this->connection->prepare("INSERT INTO account (Email, Password) VALUES (:email, :pass)");
                $statement->bindParam(':email', $email);
                $statement->bindParam(':pass', $password);
                $statement->execute();
            }
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }


    function login($email, $password) {
        try {
            $statement = $this->connection->prepare("SELECT Email, Password FROM Account VALUES (:email, :pass");

            $statement->bindParam(':email', $email);
            $statement->bindParam(':pass', $password);
            $statement->execute();
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }
}

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $userHandler = new userHandler();
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if($_POST["action"] == "registerUser") {
            $userHandler->register($email, $pass);
        }
        if($_POST["action"] == "logIn") {            
            // Later: Match with database and authenticate
            $userHandler->login($email, $pass);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        
    }

    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    
    }

} catch(EXCEPTION $err) {
    echo $err;
}

?>