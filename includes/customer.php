<?php

class Customer{
    private $name;
    private $phoneNumber;
    private $adress;
    function __construct($name, $phoneNumber, $adress){
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->adress = $adress;
    }
}
?>