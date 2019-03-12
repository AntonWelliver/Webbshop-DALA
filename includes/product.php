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
 
}
?>