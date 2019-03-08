<?php
require_once('../../includes/customer.php');


try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if($_POST["action"] == "shipping") {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $adress = $_POST['adress'];
            $city = $_POST['city'];
            $phoneNr = $_POST['phoneNr'];
            $email = $_POST['email'];
            
            $customer = new Customer($firstname, $lastname, $adress, $city, $phoneNr, $email);
            $customer->shipping(); 
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