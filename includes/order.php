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

    function saveOrder($totalPrice,$shippingAl,$customerID) {

        $sql = "INSERT INTO order (TotalPrice, ShippingAlternative,CustomerID ) VALUES (:totalPrice, :shippingAl, :customerID)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":totalPrice", $totalPrice);
        $statement->bindParam(":shippingAl", $shippingAl);
        $statement->bindParam(":customerID", $customerID);
        $statement->execute();
       
    }
    function updateStock($amount,$ProductID) {

        $sql = "UPDATE product SET UnitInStock = (UnitsInstock - :amount) WHERE productID = :productID";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":amount", $amount);
        $statement->bindParam(":productID", $ProductID);
        $statement->execute();
       
    }
    function saveToOrderList($ProductID,$Quantity) {

        $sql = "INSERT INTO orderlist (ProductID,Quantity) VALUES (:productID,:quantity)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":productID", $ProductID);
        $statement->bindParam(":quantity", $Quantity);
        $statement->execute();
       
    }
    function saveOrderInHistory($CustomerID, $OrderID) {

        $sql = "INSERT INTO orderHistory (CustomerID,OrderID) VALUES (:customerID, :orderID)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":customerID", $CustomerID);
        $statement->bindParam(":orderID", $OrderID);
        $statement->execute();
       
    }

    
}

?>