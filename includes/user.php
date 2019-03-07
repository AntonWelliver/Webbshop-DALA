<?php
require_once('../../includes/database.php');

class User {
    public $email;
    public $password;
    private $connection;
    private $database;

    function __construct($email, $password) {
        $this->database = new Database();
        $this->connection = $this->database->connect();
        $this->email = $email;
        $this->password = $password;
    }


    function register() {
        try {
            $sql = "SELECT COUNT(Email) AS num FROM account WHERE Email = :email";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':email', $this->email);
            $statement->execute();

            $emailExists = $statement->fetch(PDO::FETCH_ASSOC);

            if($emailExists['num'] > 0) {
                $response_error['status'] = 'error'; 
                $response_error['failMessage'] = 'Det finns redan ett konto med denna email!'; 
                header('Content-type: application/json');
                echo json_encode($response_error);  
            } else {
                // save user with prepare statenents
                $statement = $this->connection->prepare("INSERT INTO account (Email, Password) VALUES (:email, :pass)");
                $statement->bindParam(':email', $this->email);
                $statement->bindParam(':pass', $this->password);
                $statement->execute();
            }
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }

    function login() {
        try {
            $userExists = $statement->fetch(PDO::FETCH_ASSOC);
            
            if($userExists['num'] > 0) {
                $sql = "SELECT Email, Password FROM Account WHERE Email = :email AND Password = :pass";
                $statement = $this->connection->prepare($sql);

                $statement->bindParam(':email', $this->email);
                $statement->bindParam(':pass', $this->password);
                $statement->execute();
            }
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }
}

?>