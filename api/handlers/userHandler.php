<?php

session_start();

require_once('../../includes/user.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Username from input field
        // Email from input field
        $email = $_POST['email'];
        // Hashing password from input field
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // Creates new user object
        $user = new User();
        // If ajax action is RegisterUser, run function and save user into database
        if($_POST["action"] == "registerUser") {
            $username = $_POST['username'];
            $user->register($username, $email, $password);
        }
        if($_POST["action"] == "loginUser") {            
            // Later: Match with database and authenticate
            echo $user->login($email, $password);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        
    }

    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    
    }

} catch(EXCEPTION $err) {
    echo json_encode($err);
}

?>