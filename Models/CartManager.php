<?php 

class CartManager extends Model {

    public function getUserCart($user_id) {
        $query = "SELECT * FROM cart WHERE user_id = :user_id";
        $cartContents = $this->executeRequest($query, [':user_id' => $user_id]);
        return $cartContents->fetchAll();
    }

    public function addProductToCart($productData) {
        $query = "INSERT INTO cart (product_id, user_id, quantity) 
                  VALUES (:product_id, :user_id, :quantity)";
        $this->executeRequest($query, $productData);

    }

    public function getCartContents($user_id) {
        $query = "SELECT * FROM cart WHERE user_id = :user_id";
        $cartContents = $this->executeRequest($query, [':user_id' => $user_id]);
        return $cartContents->fetchAll();
    }

    public function getCartItem($user_id, $product_id) {
        $query = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $cartItem = $this->executeRequest($query, [
            ':user_id' => $user_id,
            ':product_id' => $product_id
        ]);
        return $cartItem->fetch();
    }

    public function updateCartItemQuantity($cart_id, $quantity) {
        $query = "UPDATE cart SET quantity = :quantity WHERE id = :id";
        $this->executeRequest($query, [
            ':quantity' => $quantity,
            ':id' => $cart_id
        ]);
    }
    
    public function removeProductFromCart($cart_id) {
        $query = "DELETE FROM cart WHERE id = :id";
        $this->executeRequest($query, [':id' => $cart_id]);
    }
}