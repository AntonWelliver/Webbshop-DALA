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

    function orderHistory() {
        $sql = "SELECT * FROM orderhistory";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        /* $res = $statement->fetch(PDO::FETCH_OBJ); */
        return $res;
    }
    function addToCart($amount, $itemID){
        if(isset($_SESSION["itemID"])){
            $itemArray = ($_SESSION["itemID"]); 
            array_push($itemArray,$itemID);
            $_SESSION["itemID"] = $itemArray;
            
        }else{
            $_SESSION["itemID"] = $itemID;
        } 
        
        if (isset($_SESSION["amount"])){
            $amountArray = ($_SESSION["amount"]); 
            array_push($itemArray,$amount);
            $_SESSION["amount"] = $amountArray;
        }else{
            $_SESSION["amount"] = $amount;
        }

    }

    
}

?>