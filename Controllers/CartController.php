<?php 

class CartController {

    private $cartManager;

    public function __construct() {
        $this->cartManager = new CartManager();
    }
}