<?php
require_once('database.php');
session_start();
class Order{
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

    function getUnsentOrders() {
        $sql = "SELECT OrderId, ShippingAlternative FROM `order` WHERE `Sent` = 0";
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
    
    function markAsSent($orderId) {
        $statement = $this->connection->prepare("UPDATE `order` SET Sent = 1 WHERE OrderID = :orderId");
        $statement->bindParam(':orderId', $orderId);
        $statement->execute();
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

    function saveOrder($totalPrice, $shippingAl, $customerID) {

        $sql = "INSERT INTO `order` (TotalPrice, ShippingAlternative, CustomerID) VALUES (:totalPrice, :shippingAl, :id)";  
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":totalPrice", $totalPrice);
        $statement->bindParam(":shippingAl", $shippingAl);
        $statement->bindParam(":id", $customerID);
        $statement->execute();

        // get orderID from this customers latest order and return it
        $selectStmt = $this->connection->prepare("SELECT OrderID from `order` WHERE CustomerID = :customerID ORDER BY OrderID DESC LIMIT 1");
        $selectStmt->bindParam(":customerID", $customerID);
        $selectStmt->execute();
        $res = $selectStmt->fetch();
        return $res[0]; 

    }
    function updateStock($amount,$ProductID) {  

        $sql = "UPDATE product SET UnitsInStock = (UnitsInstock - :amount) WHERE productID = :productID";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":amount", $amount);
        $statement->bindParam(":productID", $ProductID);
        $statement->execute();
       
    }

    function setStock($amount,$ProductID) {

        $sql = "UPDATE product SET UnitsInStock = :amount WHERE productID = :productID";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":amount", $amount);
        $statement->bindParam(":productID", $ProductID);
        $statement->execute();

    }
    function saveToOrderList($ProductID,$Quantity, $OrderID) {

        $sql = "INSERT INTO orderlist (OrderID, Product,Quantity) VALUES (:orderID, :productID,:quantity)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":productID", $ProductID);
        $statement->bindParam(":quantity", $Quantity);
        $statement->bindParam(":orderID", $OrderID);
        $statement->execute();
       
    }
    function saveOrderInHistory($CustomerID, $OrderID) {

        $sql = "INSERT INTO orderHistory (CustomerID, OrderID) VALUES (:customerID, :orderID)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":customerID", $CustomerID);
        $statement->bindParam(":orderID", $OrderID);
        $statement->execute();
       
    }

    function orderHistoryForUser($email) {
        $userId = $this->getUserIdFromEmail($email);
        $orders = $this->getOrdersFromId($userId);
        /* echo json_encode($orders); */
        // fungerar inte med nuvarande databas-setup
        return false;
    }

    function getUserIdFromEmail($email) {
        $sql = "SELECT CustomerID FROM customer WHERE EmailAdress = :email";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $res = $statement->fetch();
        return $res;
    }

    function getOrdersFromId($id) {
        $sql = "SELECT OrderID FROM `order` WHERE CustomerID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $res = $statement->fetchAll();
        
        return $res;
    }

    
}

?>