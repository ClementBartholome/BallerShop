<?php

session_start();

require_once "Config/autoload.php";

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = str_replace('/Ballers', '', $request);

switch ($request) {
    case '/':
        $controller = new ProductController();
        $controller->listProducts();
        break;

    case '/add-product-form':
        $controller = new ProductController();
        $controller->showAddForm();
        break;

    case '/add':
        $controller = new ProductController();
        $controller->addProduct();
        break;

    case '/product-details':
        if (isset($_GET['id'])) {
            $controller = new ProductController();
            $controller->showProductDetails($_GET['id']);
        } else {
            echo "Action non valide.";
        }
        break;
    
    case '/edit-product-form':
        $controller = new ProductController();
        $controller->showEditForm($_GET['id']);
        break;

    case '/edit':
        if (isset($_GET['id'])) {
            $controller = new ProductController();
            $controller->editProduct($_GET['id']);
        } else {
            echo "Action non valide.";
        }
        break;

    case '/delete':
        if (isset($_GET['id'])) {
            $controller = new ProductController();
            $controller->deleteProduct($_GET['id']);
        } else {
            echo "Action non valide.";
        }
        break;

    case '/register':
        $controller = new UserController();
        $controller->register();
        break;

    case '/login':
        $controller = new UserController();
        $controller->login();
        break;

    case '/logout':
        $controller = new UserController();
        $controller->logout();
        break;

    case '/access-denied':
        $controller = new Controller();
        $controller->accessDenied();
        break;

    default:
        http_response_code(404);
        echo "Page non trouvée.";
}


