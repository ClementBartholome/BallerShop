<?php

class ProductController {
    private $productManager;

    public function __construct() {
        $this->productManager = new ProductManager();
    }

    public function listProducts() {

        $products = $this->productManager->getProducts();
    
        $view = new View('Home');
        $view->generate(['title' => 'Liste des Produits', 'products' => $products]);
    }
    
    public function showAddForm() {
        if (isset($_SESSION['userIsLoggedIn']) && $_SESSION['userRole'] === 'admin') {
            $view = new View('AddProduct');
            $view->generate(['title' => 'Ajouter un Produit']);
        } else {
            header("Location: index.php?action=access-denied");
        }
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $productData = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'category' => $_POST['category']
            ];

            // Gérer les fichiers téléchargés
            $image1 = $_FILES['image1'];
            $image2 = $_FILES['image2'];
            $image3 = $_FILES['image3'];

            // Chemin du dossier où les images seront sauvegardées
            $uploadDirectory = 'products_images/';

            // Vérifier et traiter les images téléchargées
            if (move_uploaded_file($image1['tmp_name'], $uploadDirectory . $image1['name'])) {
                $productData['image1'] =$image1['name'];
            }
            if (move_uploaded_file($image2['tmp_name'], $uploadDirectory . $image2['name'])) {
                $productData['image2'] = $image2['name'];
            }
            if (move_uploaded_file($image3['tmp_name'], $uploadDirectory . $image3['name'])) {
                $productData['image3'] = $image3['name'];
            }

            $this->productManager->addProduct($productData);
            header("Location: index.php");
        } 
    }

    public function showProductDetails($id) {
        // Récupérez les informations du produit en utilisant l'ID
        $product = $this->productManager->getProductById($id);
    
        // Vérifiez si le produit existe
        if ($product) {
            // Chargez la vue viewProductDetails avec les données du produit
            $view = new View('ProductDetails');
            $view->generate(['title' => 'Détails du Produit', 'product' => $product]);
        } else {
            // Gérez le cas où le produit n'existe pas, par exemple, redirigez vers une page d'erreur.
            // Vous pouvez également afficher un message d'erreur à l'utilisateur.
        }
    }
    

    public function editProduct($id) {
        // Vérifier si le formulaire d'édition a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $productData = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image1' => $_POST['image1'],
                'image2' => $_POST['image2'],
                'image3' => $_POST['image3'],
                'category' => $_POST['category']
            ];

            // Mettre à jour le produit dans la base de données
            $this->productManager->updateProduct($id, $productData);

            // Rediriger vers la page de liste des produits
            header("Location: index.php");
        } else {
            // Récupérer les informations du produit à éditer
            $product = $this->productManager->getProductById($id);

            // Afficher le formulaire d'édition de produit avec les informations pré-remplies (vous pouvez utiliser une vue pour cela)
            // Par exemple : include 'View/edit_product_form.php';
        }
    }

    public function deleteProduct($id) {
        // Supprimer le produit avec l'ID spécifié depuis la base de données
        $this->productManager->deleteProduct($id);

        // Rediriger vers la page de liste des produits
        header("Location: index.php");
    }

    
}
