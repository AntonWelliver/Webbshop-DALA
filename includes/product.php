<?php
require_once('../../includes/database.php');

class Product{
    private $connection;
    private $database;

    function __construct(){
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }

    function addProduct($name, $price, $category, $image) {
        try {
            $sql = "SELECT COUNT(name) AS num FROM product WHERE name = :name";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':name', $name);
            $statement->execute();

            $producetExist = $statement->fetch(PDO::FETCH_ASSOC);
            if($producetExist['num'] > 0) {
                $response_array['status'] = 'error'; 
                 
                header('Content-type: application/json');
                echo json_encode($response_array);
            }else{
               /*  Lägg till image i database */
                $statement = $this->connection->prepare("INSERT INTO product (Name, Price, Category, imageSource) VALUES (:name, :price, :category, :image)");
                $statement->bindParam(':name', $name);
                $statement->bindParam(':price', $price);
                $statement->bindParam(':category', $category);
                $statement->bindParam(':image', $image);
                /* $statement->bindParam(':image', $this->image); */
                $statement->execute();
            }
            
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }

    }

    function getSingleProduct($id) {
        $sql = "SELECT * FROM product WHERE ProductID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $res = $statement->fetchAll();
        /* $res = $statement->fetch(PDO::FETCH_OBJ); */
        return $res;
    }
    function removeProduct($removeProductID){
        $sql = "DELETE FROM product WHERE ProductID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $removeProductID);
        $statement->execute();

    }


    /* Retrieve all list of products from database */
    function listOfProductsAdmin() {
        $sql = "SELECT ProductID, Name, Category, UnitsInStock FROM product ORDER BY ProductID DESC";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        
        return $res;
    }
 
    /* Update product category for admin page */
    function updateProductCategory($updateProductID, $updateProductCategory) {
        $sql = "UPDATE product SET Category = '$updateProductCategory' WHERE ProductID = $updateProductID";
        $statement = $this->connection->prepare($sql);

    }
    function getProductList() {
        $sql = "SELECT ProductId, Name FROM product";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    function getOrderHistory($customerId) { // till order
        $sql = "SELECT ProductId, Name FROM product";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':customerId', $customerId);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    function showProductsWithCategory($category) {
        try {
            $sql = "SELECT * FROM product WHERE Category = :category";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':category', $category);
            $statement->execute();
            $res = $statement->fetchAll();
            /* $res = $statement->fetch(PDO::FETCH_OBJ); */
            return $res;
        } catch (Exeption $e) {
            throw $e;
        }
    }
    function showProducts() {
        try {
            $sql = "SELECT * FROM product";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $res = $statement->fetchAll();
            return $res;
        } catch (Exeption $e) {
            throw $e;
        }
    }
}
?>