<?php 

class Router {

    private $controller;
    private $productController;
    private $userController;

    public function __construct() {
        $this->controller = new Controller();
        $this->productController = new ProductController();
        $this->userController = new UserController();
    }

    public function routerRequest() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] === 'add') {
                    $this->productController->addProduct();
                } elseif ($_GET['action'] === 'showAddForm') {
                    $this->productController->showAddForm();
                } elseif ($_GET['action'] === 'edit') {
                    $this->productController->editProduct($_GET['id']);
                } elseif ($_GET['action'] === 'delete') {
                    $this->productController->deleteProduct($_GET['id']);
                } elseif ($_GET['action'] === 'register') {
                    $this->userController->register();
                } elseif ($_GET['action'] === 'login') {
                    $this->userController->login();
                } elseif ($_GET['action'] === 'logout') {
                    $this->userController->logout();
                } elseif ($_GET['action'] === 'access-denied') {
                    $this->controller->accessDenied();
                } else {
                    echo "Action non valide.";
                }
            } else {
                $this->productController->listProducts();
            }
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}