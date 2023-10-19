<?php 
class CartModel {
    private int $id;
    private int $user_id;
    private int $product_id;
    private int $quantity;

    public function __construct($id, $user_id, $product_id, $quantity) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
            $this->id = $id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId(int $user_id) {
            $this->user_id = $user_id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId(int $product_id) {
            $this->product_id = $product_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity(int $quantity) {
            $this->quantity = $quantity;
    }

}