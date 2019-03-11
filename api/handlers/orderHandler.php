<?php
require_once('../../includes/order.php');


try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        /* shippingHistory action POST the value from script */
        if ($_POST["action"] == "shippingHistory") {
            $order = new Order(); 
            $history = $order->orderHistory();
            header('Content-type: application/json');
            echo json_encode($history);  
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