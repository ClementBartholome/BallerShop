<?php 

class CartController {
    private $cartManager;
    private $productManager;

    public function __construct() {
        $this->cartManager = new CartManager();
        $this->productManager = new ProductManager();
    }

    public function addProductToCart($product_id, $user_id, $quantity) {
        // Check if the product is already in the cart
        $existingCartItem = $this->cartManager->getCartItem($user_id, $product_id);
    
        if ($existingCartItem) {
            // The product is already in the cart, update the quantity
            $newQuantity = $existingCartItem['quantity'] + $quantity;
            $this->cartManager->updateCartItemQuantity($existingCartItem['id'], $newQuantity);
        } else {
            // The product is not in the cart, so add it
            $cartModel = new CartModel(0, $user_id, $product_id, $quantity);
            $this->cartManager->addProductToCart([
                ':product_id' => $cartModel->getProductId(),
                ':user_id' => $cartModel->getUserId(),
                ':quantity' => $cartModel->getQuantity()
            ]);
        }
    }

    public function getProductDetails($product_id) {
        $productDetails = $this->productManager->getProductDetails($product_id);
        return $productDetails;
    }
    
    public function calculateCartTotals($cartItems) {
        $totalCartPrice = 0;
    
        foreach ($cartItems as &$item) {
        
            $item['total_price'] = $item['product_price'] * $item['quantity'];
            $totalCartPrice += $item['total_price'];
        }
    
        return $totalCartPrice;
    }

    public function removeProductFromCart($cart_id) {
        $this->cartManager->removeProductFromCart($cart_id);
        header("Location: /Ballers/cart");
    }
    
    
    

    public function getUserCart($user_id) {
        $userCart = $this->cartManager->getUserCart($user_id);
        $cartItems = [];
    
        foreach ($userCart as $cartItem) {
            $productDetails = $this->getProductDetails($cartItem['product_id']);
            $totalPrice = $productDetails['price'] * $cartItem['quantity']; 
    
            $cartItems[] = [
                'cart_id' => $cartItem['id'],
                'product_name' => $productDetails['name'],
                'product_price' => $productDetails['price'],
                'quantity' => $cartItem['quantity'],
                'total_price' => $totalPrice,
            ];
        }

        // var_dump($cartItems);
        // die();

        $totalCartPrice = $this->calculateCartTotals($cartItems);
    
        $view = new View('Cart');
        $view->generate([
            'title' => 'Votre panier',
            'cartItems' => $cartItems,
            'totalCartPrice' => $totalCartPrice
        ]);
    }    
}
