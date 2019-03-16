<?php
require_once('../../includes/newsletter.php');
require_once('../../includes/helper.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if($_POST["action"] == "registera") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $news = new News();
            $news->newsregister($username,$email);
        }
        if ($_POST["action"] == "showSubscribers") {
            $news = new News(); 
            $subscribers = $news->showSubscribers();
            header('Content-type: application/json');
            echo json_encode($subscribers);  
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