<?php
require_once('../../includes/database.php');

class News{
    public $username;
    public $email;
    private $connection;
    private $database;

    function __construct($username, $email) {
        $this->database = new Database();
        $this->connection = $this->database->connect();
        $this->username = $username;
        $this->email = $email;
    }

    function newsregister(){
        try{

            
                // save user with prepare statements
                $statement = $this->connection->prepare("UPDATE account SET IsSubscriber = 1 WHERE username = :username AND email = :email");
                $statement->bindParam(':username', $this->username);
                $statement->bindParam(':email', $this->email);
                $statement->execute();
            
        }    catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }
}
?>