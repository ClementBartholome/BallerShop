<?php

// class CategoryController {
//     private $categoryManager;

//     public function __construct() {
//         $this->categoryManager = new CategoryManager();
//     }

//     public function listCategories() {
//         $categories = $this->categoryManager->getCategories();
        
//         $view = new View('Home');
//         $view->generate(['title' => 'Tous nos produits', 'categories' => $categories]);
//     }
// }