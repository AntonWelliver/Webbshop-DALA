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
                $response_array['status'] = 'error'; 
                $response_array['message'] = 'Det finns redan ett konto med denna email!'; 
                header('Content-type: application/json');
                echo json_encode($response_array);  
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
            $statement = $this->connection->prepare("SELECT Email, Password FROM Account VALUES (:email, :pass");

            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':pass', $this->password);
            $statement->execute();
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }
}

?>