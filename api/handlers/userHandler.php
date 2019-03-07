<?php
require_once('../../includes/user.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $user = new User($email, $pass);

        if($_POST["action"] == "registerUser") {
            $user->register();
        }
        if($_POST["action"] == "logIn") {            
            // Later: Match with database and authenticate
            $user->login();
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