<?php
require_once('../../includes/user.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // Email from input field
        $email = $_POST['email'];
        // Hashing password from input field
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // Creates new user object
        $user = new User($email, $pass);
        // If ajax action is RegisterUser, run function and save user into database
        if($_POST["action"] == "registerUser") {
            $user->register();
        }
        if($_POST["action"] == "loginUser") {            
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