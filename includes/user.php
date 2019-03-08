<?php
require_once('../../includes/database.php');

class User {
    private $connection;
    private $database;

    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
        
    }


    function register($username, $email, $password) {
        try {
            $sql = "SELECT COUNT(Email) AS num FROM account WHERE Email = :email";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();

            $emailExists = $statement->fetch(PDO::FETCH_ASSOC);

            if($emailExists['num'] > 0) {
                $response_error['status'] = 'error'; 
                $response_error['failMessage'] = 'Det finns redan ett konto med denna email!'; 
                header('Content-type: application/json');
                echo json_encode($response_error);  
            } else {
                // save user with prepare statenents
                $statement = $this->connection->prepare("INSERT INTO account (Username, Email, Password) VALUES ( :username, :email, :pass)");
                $statement->bindParam(':username', $username);
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
            if(empty($email) || empty($password)) {  
                return json_encode("Wrong password");
            } 

            $sql = "SELECT COUNT(Email) as num, Password FROM account WHERE Email = :email";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();

            $fetchPass = $statement->fetch(PDO::FETCH_ASSOC);
 
            // If account (email) exists
            if($fetchPass['num'] > 0) {  
                // verify hashed password with input
                if (password_verify($_POST["password"], $fetchPass["Password"])){
                    header('Content-type: application/json');
                    return json_encode(array("status"=>"success")); 
                } else {
                    $message['status'] = 'password is not valid'; 
                    header('Content-type: application/json');
                    return json_encode($message); 
                }

            } else {
                echo json_encode("Nått gick fel!");
            }

         
        } catch (EXCEPTION $err) {
            throw $err;
        }
    }
}

?>