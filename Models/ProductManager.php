<?php

class ProductManager extends Model {
    public function getProducts() {
        $query = "SELECT * FROM products";
        $result = $this->executeRequest($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $result = $this->executeRequest($query, [':id' => $id]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductIdByName($name) {
        $query = "SELECT id FROM products WHERE name = :name";
        $result = $this->executeRequest($query, [':name' => $name]);
        $product = $result->fetch(PDO::FETCH_ASSOC);
        return $product['id'];
    }

    public function getProductsByCategory($category) {
        $query = "SELECT * FROM products WHERE category = :category";
        $result = $this->executeRequest($query, [':category' => $category]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductDetails($product_id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $result = $this->executeRequest($query, [':id' => $product_id]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($productData) {
        $query = "INSERT INTO products (name, description, price, image1, image2, image3, category) 
                  VALUES (:name, :description, :price, :image1, :image2, :image3, :category)";
        $this->executeRequest($query, $productData);
    }

    public function updateProduct($id, $productData) {
        $query = "UPDATE products SET name = :name, description = :description, price = :price, 
                 category = :category 
                  WHERE id = :id";
        $productData[':id'] = $id;
        $this->executeRequest($query, $productData);
    }

    public function deleteProduct($id) {
        // Delete product from categories_products junction table
        $this->removeProductFromCategories($id);
    
        // Delete product from products table
        $query = "DELETE FROM products WHERE id = :id";
        $this->executeRequest($query, [':id' => $id]);
    }
    
    public function removeProductFromCategories($productId) {
        $query = "DELETE FROM categories_products WHERE product_id = :product_id";
        $this->executeRequest($query, [':product_id' => $productId]);
    }
}

