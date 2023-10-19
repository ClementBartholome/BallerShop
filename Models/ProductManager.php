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

    public function addProduct($productData) {
        $query = "INSERT INTO products (name, description, price, image1, image2, image3, category) 
                  VALUES (:name, :description, :price, :image1, :image2, :image3, :category)";
        $this->executeRequest($query, $productData);

    }

    public function updateProduct($id, $productData) {
        $query = "UPDATE products SET name = :name, description = :description, price = :price, 
                  image1 = :image1, image2 = :image2, image3 = :image3, category = :category 
                  WHERE id = :id";
        $productData[':id'] = $id;
        $this->executeRequest($query, $productData);
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $this->executeRequest($query, [':id' => $id]);
    }
}

