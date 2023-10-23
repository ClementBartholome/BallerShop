<?php 

class CartManager extends Model {
    public function addProductToCart($productData) {
        $query = "INSERT INTO cart (product_id, user_id, quantity) 
                  VALUES (:product_id, :user_id, :quantity)";
        $this->executeRequest($query, $productData);

    }
}