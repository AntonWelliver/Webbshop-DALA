<?php
require_once('../../includes/database.php');

class User {
    public $username;
    public $email;
    public $password;
    private $connection;
    private $database;

    function __construct($username, $email, $password) {
        $this->database = new Database();
        $this->connection = $this->database->connect();
        $this->username = $username;
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
                $statement = $this->connection->prepare("INSERT INTO account (Username, Email, Password) VALUES ( :username, :email, :pass)");
                $statement->bindParam(':username', $this->username);
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
            if(empty($_POST["email"]) || empty($_POST["password"])) {  
                echo "wrong password";
            } else {
                $sql = "SELECT COUNT(Email) as num, Password FROM account WHERE Email = :email";
                $statement = $this->connection->prepare($sql);
                $statement->bindParam(':email', $this->email);
                $statement->execute();
            }
                $fetchPass = $statement->fetch(PDO::FETCH_ASSOC);
            // If account (email) exists
            if($fetchPass['num'] > 0) {  
 
                // verify hashed password with input
                if (password_verify($_POST["password"], $fetchPass["Password"])){
                    $message['status'] = 'password is valid'; 
                    header('Content-type: application/json');
                    echo json_encode($message); 
                } else {
                    $message['status'] = 'password is not valid'; 
                    header('Content-type: application/json');
                    echo json_encode($message); 
                }

            } else {
                // dont exist error message
            }

         
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }
}

?>