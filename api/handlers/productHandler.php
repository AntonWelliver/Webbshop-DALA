<?php
require_once('../../includes/product.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST["action"] == "addProduct") {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $image = $_POST['image'];
            $user = new Product();
            $user->addProduct($name, $price, $category, $image);
        }
        
        if ($_POST["action"] == "getProductsWithCategory") {
            $product = new Product();
            $category = $_POST['category'];
            $products = $product->showProductsWithCategory($category);
            header('Content-type: application/json');
            echo json_encode($products);  
        }

        if ($_POST["action"] == "getAllProducts") {
            $product = new Product();
            $products = $product->showProducts();
            header('Content-type: application/json');
            echo json_encode($products);  
        }
        if ($_POST["action"] == "removeProduct") { 
            $product  = new Product();
            $removeProductID = $_POST['removeProductID'];
            $product->removeProduct($removeProductID);

        }

        /* Retrieve all list of products from database */

        if ($_POST["action"] == "listOfProductsAdmin") {
            $product = new Product(); 
            $listOfAllProducts = $product->listOfProductsAdmin();
            header('Content-type: application/json');
            echo json_encode($listOfAllProducts);  
        }

        /* Update product category for admin */

        if ($_POST["action"] == "updateProductCategory") {
            $updateProductID = $_POST['updateProductID'];
            $updateProductCategory = $_POST['productCategory'];
            $product = new Product(); 
            $product->updateProductCategory($updateProductID, $updateProductCategory); 
        }

    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if ($_GET["action"] == "getProductList") {
            $product  = new Product();
            $products = $product->getProductList();
            echo json_encode($products);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    
    }

} catch(EXCEPTION $err) {
    echo $err;
}

?>