<?php

session_start();

require_once('../../includes/user.php');


try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if(empty($_POST['email']) && empty($_POST['password'])) {
            return false;
        } else {
            $username = $_POST['username'];
            // Hashing password from input field
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Creates new user object
            $user = new User();
            // If ajax action is RegisterUser, run this line of code
            if($_POST["action"] == "registerUser") {
                // Username from input only for register
                $email = $_POST['email'];
                $user->register($username, $email, $password);
            }
            // If ajax action is loginUser, run this line of code
            if($_POST["action"] == "loginUser") {            
                // Later: Match with database and authenticate
                $user->login($username, $password);
            }

            if ($_POST["action"] == 'logout') {   
                unset($_SESSION["user"]);
                session_destroy();
                echo "success";
            }
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