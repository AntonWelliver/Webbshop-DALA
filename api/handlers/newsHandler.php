<?php
require_once('../../includes/newsletter.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if($_POST["action"] == "registera") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $news = new Newsletter();
            $news->newsregister($username,$email);
        }
        if ($_POST["action"] == "showSubscribers") {
            $news = new Newsletter(); 
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