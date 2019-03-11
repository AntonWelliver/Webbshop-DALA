<?php
require_once('../../includes/database.php');
class Order{
    private $connection;
    private $database;

    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }
    function orderHistory() {
        $sql = "SELECT * FROM orderhistory";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        /* $res = $statement->fetch(PDO::FETCH_OBJ); */
        return $res;
    }

}

?>