<?php
class User {
    private $email;
    private $password;
    function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }
} 

?>