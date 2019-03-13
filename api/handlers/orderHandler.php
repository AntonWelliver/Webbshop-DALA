<?php
require_once('../../includes/order.php');

require_once('../../includes/product.php');

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
            echo json_encode(count($_SESSION['itemID']));
        }
        
        if (($_POST["action"] == "getCart") && (isset($_SESSION['itemID']))) {
            $tableData = [];
            $totalPrice = 0;
            for ($i = 0; $i < count($_SESSION['itemID']); $i++) {
                $ids = json_encode($_SESSION['itemID']);
                $amounts = json_encode($_SESSION['amount']);
                $id = $_SESSION['itemID'][$i];
                $amount = $_SESSION['amount'][$i];
                $product = new Product();
                $productData = $product->getSingleProduct($id);
                $name = $productData[0]['Name'];
                $price =  $productData[0]['Price'];
                $totalPrice = $totalPrice + ($price * $amount);
                $code = " 
                    <tr>
                        <td>
                            $name
                        </td>
                        <td>
                            $amount
                        </td>
                        <td>
                            $price
                        </td>
                    </tr>
                ";
                array_push($tableData, $code);
            }
            echo json_encode($tableData); 
            $_SESSION['totalPrice'] = $totalPrice;
            /* echo json_encode($_SESSION); */
        }

        if($_POST["action"] == "getTotalPrice") {
            echo $_SESSION['totalPrice'];
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
