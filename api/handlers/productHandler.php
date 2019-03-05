<?php
require_once('../../includes/product.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = ''; // schould be created automatically?
        $name = $_POST[''];
        $price = $_POST[''];
        $category = $_POST[''];
        $image = $_POST[''];

        if($_POST["action"] == "addProduct") {
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