<?php
require_once('../../includes/database.php');

class News{
    public $email;
    private $connection;
    private $database;

    function __construct($email) {
        $this->database = new Database();
        $this->connection = $this->database->connect();
        $this->email = $email;
    }

    function newsregister(){
        try{

            
                // save user with prepare statements
                $statement = $this->connection->prepare("UPDATE account SET IsSubscriber = 1 WHERE email = :email");
                $statement->bindParam(':email', $this->email);
                $statement->execute();
            
        }    catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }
}
?>