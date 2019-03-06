<?php
require_once('../../includes/product.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = ''; // schould be created automatically?
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $image = $_POST['image'];

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