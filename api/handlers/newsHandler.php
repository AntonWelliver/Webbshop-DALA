<?php
require_once('../../includes/newsletter.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $news = new News($username,$email);


        if($_POST["action"] == "registera") {
            $news->newsregister();
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