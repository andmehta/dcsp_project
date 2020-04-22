<?php

class Cart
{

    public function __construct()
    {
        public $itemQuantity = "";
        public $cartArray = "";
    }

    public function addItem($itemID, $itemQuantity)
    {
        array_push($cartArray, $itemID, $itemQuantity);
    }

    public function removeItem($itemID, $itemQuantity)
    {
        $result = array_search($itemID, $cartArray);
        if($result == ""){
            echo("That item is not in your cart!");
        }
        else{

        }
    }

    public function checkout($cartArray)
    {

    }

    public function viewCart($cartArray)
    {

    }
}





