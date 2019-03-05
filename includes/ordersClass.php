<?php
class Order{
    private $shipping;
    private $price;
    function __construct($shipping, $price){
        $this->shipping = $shipping;
        $this->price = $price;
    }
}

?>