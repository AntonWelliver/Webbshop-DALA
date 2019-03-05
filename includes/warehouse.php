<?php
class Warehouse{
    public $product;
    private $quantity;
    function __construct($product, $quantity){
        $this->product = $product;
        $this->quantity = $quantity;
    }
}

?>