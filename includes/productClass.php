<?php

class Product{
    private $name;
    private $price;
    private $productID;
    private $category;
    private $image;
    function __construct($name, $price, $productID, $category, $image){
        $this->name = $name;
        $this->price = $price;
        $this->productID = $productID;
        $this->category = $category;
        $this->image = $image;
        
    }
 
}
?>