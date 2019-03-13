<?php
require_once('../../includes/database.php');
session_start();
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
    // Admin thing
    function orderHistory() {
        $sql = "SELECT * FROM orderhistory";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        /* $res = $statement->fetch(PDO::FETCH_OBJ); */
        return $res;
    }
    // Add to cart button on home page
    function addToCart($amount, $itemID){
        if(isset($_SESSION["itemID"])){
            $itemArray = ($_SESSION["itemID"]); 
            array_push($itemArray,$itemID);
            $_SESSION["itemID"] = $itemArray;
            
        }else{
            $_SESSION["itemID"] = array($itemID);
        } 
        
        if (isset($_SESSION["amount"])){
            $amountArray = ($_SESSION["amount"]); 
            array_push($amountArray,$amount);
            $_SESSION["amount"] = $amountArray;
        }else{
            $_SESSION["amount"] = array($amount);
        }

    }

    function saveOrder() {
        $amount = json_encode($_SESSION["amount"]);
        $quantity = json_encode($_SESSION["itemID"]);
        echo $amount, $quantity;
        $sql = "INSERT INTO order (TotalPrice, Quantity) VALUES (:totalprice, :quantity)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":totalprice", $amount);
        $statement->bindParam(":quantity", $quantity);
        $statement->execute();
       
    }

    
}

?>