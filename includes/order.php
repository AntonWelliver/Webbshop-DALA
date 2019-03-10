<?php
require_once('../../includes/database.php');

class Order{
    private $shipping;
    private $price;
    private $connection;
    private $database;

    function __construct(){
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }
    function getShippingOptions() {
        $sql = "SELECT * FROM shipping";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

}

?>