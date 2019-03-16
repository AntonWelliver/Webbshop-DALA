<?php
require_once('database.php');

class Newsletter{
    private $connection;
    private $database;

    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }

    function newsregister($username, $email){
        try{
                // save user with prepare statements
                $statement = $this->connection->prepare("UPDATE account SET IsSubscriber = 1 WHERE username = :username AND email = :email");
                $statement->bindParam(':username', $username);
                $statement->bindParam(':email', $email);
                $statement->execute();
            
        }    catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }

    /* En function som ser subscriber count */
    function showSubscribers() {
        $sql = "SELECT Email, Username FROM account WHERE IsSubscriber = 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        /* $res = $statement->fetch(PDO::FETCH_OBJ); */
        return $res;
    }
}
?>