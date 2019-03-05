<?php
require_once('../../includes/product.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = ''; // schould be created automatically?
        $name = $_POST['productName'];
        $price = $_POST['productPrice'];
        $category = $_POST['productCategory'];
        $image = $_POST['addImage'];

        if($_POST["action"] == "addProduct") {
            $user = new Product($id, $name, $price, $category, $image);
            $user->addProduct();
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