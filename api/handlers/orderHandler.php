<?php
require_once('../../includes/order.php');


require_once('../../includes/helper.php'); // Delete this, we don't use it


try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        /* shippingHistory action POST the value from script */
        if ($_POST["action"] == "shippingHistory") {
            $order = new Order(); 
            $history = $order->orderHistory();
            header('Content-type: application/json');
            echo json_encode($history);  
        }

        if($_POST["action"] == "getShippingOptions") {
            $order = new Order();
            $shippingOptions = $order->getShippingOptions();
            header('Content-type: application/json');
            echo json_encode($shippingOptions);  
        }

        if($_POST["action"] == "addToCart") {
            $amount = $_POST["amount"];
            $itemID = $_POST["itemID"];
            $order = new Order();
            $order->addToCart($amount,$itemID);
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
