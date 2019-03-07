<?php
require_once('../../includes/database.php');

class Product{
    private $name;
    private $price;
    private $category;
    private $image;
    private $connection;
    private $database;

    function __construct($name, $price, $category, $image){
        $this->database = new Database();
        $this->connection = $this->database->connect();
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->image = $image;
        
    }

    function addProduct() {
        try {
            $sql = "SELECT COUNT(name) AS num FROM product WHERE name = :name";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':name', $this->name);
            $statement->execute();

            $producetExist = $statement->fetch(PDO::FETCH_ASSOC);
            if($producetExist['num'] > 0) {
                $response_array['status'] = 'error'; 
                 
                header('Content-type: application/json');
                echo json_encode($response_array);
            }else{
               /*  Lägg till image i database */
                $statement = $this->connection->prepare("INSERT INTO product (Name, Price, Category, imageSource) VALUES (:name, :price, :category, :image)");
                $statement->bindParam(':name', $this->name);
                $statement->bindParam(':price', $this->price);
                $statement->bindParam(':category', $this->category);
                $statement->bindParam(':image', $this->image);
                /* $statement->bindParam(':image', $this->image); */
                $statement->execute();
            }
            
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }

    }
 
}
?>