<?php 

class CategoryManager extends Model {
    public function getCategories() {
        $query = "SELECT * FROM categories";
        $result = $this->executeRequest($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}