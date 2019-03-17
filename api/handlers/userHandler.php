<?php

session_start();

require_once('../../includes/user.php');
require_once('../../includes/newsletter.php');


try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if ($_POST["action"] == "logout") {
            session_destroy();
            unset($_SESSION["user"]);
            echo "success";
            die;
        }

        if(empty($_POST['email']) && empty($_POST['password'])) {
            die;
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
                $newsLetter = $_POST['newsletter'];
                $user->register($username, $email, $password);
                if ($newsLetter == "on") {
                    $news = new Newsletter();
                    $news->newsregister($username,$email);
                }
            }
            // If ajax action is loginUser, run this line of code
            if($_POST["action"] == "loginUser") {            
                // Later: Match with database and authenticate
                $user->login($username, $password);
            }

            
        }
    }


    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if ($_GET["action"] == "getLoggedIn") {
            if (isset($_SESSION['user'])) {
                $userName = $_SESSION['user'];
                $user = new User();
                $email = $user->getEmail($userName);
                echo $email;
            } else {
                echo false;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    
    }

} catch(EXCEPTION $err) {
    echo json_encode($err);
}

?>