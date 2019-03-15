<?php
require_once('../../includes/order.php');

require_once('../../includes/product.php');

require_once('../../includes/customer.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        /* shippingHistory action POST the value from script */
        if ($_POST["action"] == "shippingHistory") {
            $order = new Order(); 
            $history = $order->orderHistory();
            header('Content-type: application/json');
            echo json_encode($history);  
        }

        // Add products to cart from home page and save into SESSION
        if($_POST["action"] == "addToCart") {
            $amount = $_POST["amount"];
            $itemID = $_POST["itemID"];
            $order = new Order();
            $order->addToCart($amount,$itemID);
            echo json_encode(count($_SESSION['itemID']));
        }

        if ($_POST["action"] == "purchase") {
            $amounts = $_SESSION["amount"];
            $ids = $_SESSION["itemID"];
            // spara i customer kunden
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $adress = $_POST['adress'];
            $city = $_POST['city'];
            $phoneNr = $_POST['phoneNr'];
            $email = $_POST['email'];
            
            $customer = new Customer($firstname, $lastname, $adress, $city, $phoneNr, $email);
            // what if user is already in database, maybe a check if alreadyUser and then update any values that are changed
            $customerID = $customer->saveUser(); 
            // spara i databas order: totalPrice och shippingAlternative, samt CustomeID ge id
            $totalPrice = $_POST['totalPrice'];
            $shippingAlternative = $_POST['shippingAlternative'];
            $order = new Order();
            $orderID = $order->saveOrder($totalPrice, $shippingAlternative, $customerID); 
            // spara i orderHistory
            $order->saveOrderInHistory($customerID, $orderID); // behövs verkligen denna tabell?? Nej, kan ta bort
            for ($i = 0; $i < count($ids); $i++) {
                $amount = $amounts[$i];
                $productID = $ids[$i];
                // baserat på id spara i orderlist, id, produktidn samt antal
                $order->saveToOrderList($productID, $amount, $orderID);
                // minska antalet prdoukter i product
                $order->updateStock($amount, $productID);
            }
        }

    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if($_GET["action"] == "getTotalPrice") {
            if(isset($_SESSION['totalPrice'])) {
                echo $_SESSION['totalPrice'];
            } else {
                echo "0";
            }
            
        }

        if (($_GET["action"] == "getCart") && (isset($_SESSION['itemID']))) {
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
        }

        if($_GET["action"] == "getShippingOptions") {
            $order = new Order();
            $shippingOptions = $order->getShippingOptions();
            header('Content-type: application/json');
            echo json_encode($shippingOptions);  
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    
    }

} catch(EXCEPTION $err) {
    echo $err;
}

?>
