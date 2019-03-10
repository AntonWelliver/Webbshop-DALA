<?php
require_once('../../includes/product.php');
require_once('../../includes/helper.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST["action"] == "addProduct") {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $image = $_POST['image'];
            $user = new Product($name, $price, $category, $image);
            $user->addProduct();
        }
        
        if ($_POST["action"] == "getProductsWithCategory") {
            $helper = new Helper(); 
            $category = $_POST['category'];
            $products = $helper->showProductsWithCategory($category);
            header('Content-type: application/json');
            echo json_encode($products);  
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        
    }

    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    
    }

} catch(EXCEPTION $err) {
    echo $err;
}

?>