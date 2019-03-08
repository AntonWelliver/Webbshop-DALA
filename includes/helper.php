<?php
require_once('../../includes/database.php');

// this is a helper class for getting multiple values
class Helper {
    private $connection;
    private $database;

    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }

    function showProductsWithCategory($category) {
        try {
            // PDO gillar inte åäö, måste lägga till UTF8-standard
            $sql = "SELECT * FROM product WHERE Category = :category";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':category', $category);
            $statement->execute();
            $res = $statement->fetchAll();
            /* $res = $statement->fetch(PDO::FETCH_OBJ); */
            return $res;
           /*  return $res; */
        } catch (Exeption $e) {
            throw $e;
        }
    }

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