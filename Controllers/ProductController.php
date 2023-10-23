<?php

class ProductController {
    private $productManager;
    private $categoryManager;

    public function __construct() {
        $this->productManager = new ProductManager();
        $this->categoryManager = new CategoryManager();
    }

    public function listCategoriesAndProducts() {
        $categories = $this->categoryManager->getCategories();
        $productsData = $this->productManager->getProducts(); 

        $products = []; 
        foreach ($productsData as $productData) {
            $product = new ProductModel(
                $productData['id'],
                $productData['name'],
                $productData['description'],
                $productData['price'],
                $productData['image1'],
                $productData['image2'],
                $productData['image3'],
                $productData['category']
            );
            $products[] = $product;
        }

        $view = new View('Home');
        $view->generate(['title' => 'Tous nos produits', 'categories' => $categories, 'products' => $products]);
    }

    public function listProductsByCategory($category) {
        $categories = $this->categoryManager->getCategories();
        $productsData = $this->productManager->getProductsByCategory($category);
        foreach ($productsData as $productData) {
            $product = new ProductModel(
                $productData['id'],
                $productData['name'],
                $productData['description'],
                $productData['price'],
                $productData['image1'],
                $productData['image2'],
                $productData['image3'],
                $productData['category']
            );
            $products[] = $product;
        }

        $view = new View('Home');
        $view->generate(['title' => 'Tous nos produits', 'categories' => $categories, 'category' => $category, 'products' => $products]);
    }
    

    public function showAddForm() {
        // Check if the user is logged in as an admin
        if (isset($_SESSION['userIsLoggedIn']) && $_SESSION['userRole'] === 'admin') {
            // Generate the view for adding a product
            $view = new View('AddProduct');
            $view->generate(['title' => 'Add a Product']);
        } else {
            // Redirect to the access-denied page if not an admin
            header("Location: /Ballers/access-denied");
        }
    }

    public function addProduct() {
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $productData = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'category' => $_POST['category']
            ];

            // Handle uploaded files
            $image1 = $_FILES['image1'];
            $image2 = $_FILES['image2'];
            $image3 = $_FILES['image3'];

            // Directory path where images will be stored
            $uploadDirectory = 'products_images/';

            // Check and process uploaded images
            if (move_uploaded_file($image1['tmp_name'], $uploadDirectory . $image1['name'])) {
                $productData['image1'] = $image1['name'];
            }
            if (move_uploaded_file($image2['tmp_name'], $uploadDirectory . $image2['name'])) {
                $productData['image2'] = $image2['name'];
            }
            if (move_uploaded_file($image3['tmp_name'], $uploadDirectory . $image3['name'])) {
                $productData['image3'] = $image3['name'];
            }

          
            $this->productManager->addProduct($productData);

            $categoryID = $this->categoryManager->getCategoryIdByName($productData['category']);

            if (!$categoryID) {
         
                $categoryID = $this->categoryManager->addCategory($productData['category']);
            }

            $productID = $this->productManager->getProductIdByName($productData['name']);

         
            $this->categoryManager->associateProductWithCategory($productID, $categoryID);

           
            header("Location: /Ballers");
        }
    }

    public function showProductDetails($id) {
        // Get product information by ID
        $product = $this->productManager->getProductById($id);
    
        // Check if the product exists
        if ($product) {
            $productModel = new ProductModel(
                $product['id'],
                $product['name'],
                $product['description'],
                $product['price'],
                $product['image1'],
                $product['image2'],
                $product['image3'],
                $product['category']
            );
            // Load the view for product details with product data
            $view = new View('ProductDetails');
            $view->generate(['title' => 'Product Details', 'product' => $productModel]);
        }
    }
    
    public function showEditForm($id) {
        // Check if the user is logged in as an admin
        if (isset($_SESSION['userIsLoggedIn']) && $_SESSION['userRole'] === 'admin') {
            // Get information about the product to edit
            $product = $this->productManager->getProductById($id);
            // Check if the product exists
            if ($product) {
                $productModel = new ProductModel(
                    $product['id'],
                    $product['name'],
                    $product['description'],
                    $product['price'],
                    $product['image1'],
                    $product['image2'],
                    $product['image3'],
                    $product['category']
                );
                // Generate the view for editing a product
                $view = new View('EditProduct');
                $view->generate(['title' => 'Edit Product', 'product' => $productModel]);
            }         
        } else {
            // Redirect to the access-denied page if not an admin
            header("Location: /Ballers/access-denied");
        }
    }
    

    public function editProduct($id) {
        // Check if the edit form has been submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $productData = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'category' => $_POST['category']
            ];

            // Update the product in the database
            $this->productManager->updateProduct($id, $productData);

            // Redirect to the list of products page
            header("Location: /Ballers");
        } else {
            // Get information about the product to edit
            $product = $this->productManager->getProductById($id);

            // Display the product edit form with pre-filled information (you can use a view for this)
            // For example: include 'View/edit_product_form.php';
        }
    }

    public function deleteProduct($id) {
        // Get the file names of images associated with the product
        $product = $this->productManager->getProductById($id);
        $image1 = $product['image1'];
        $image2 = $product['image2'];
        $image3 = $product['image3'];

        // Delete the product from the database
        $this->productManager->deleteProduct($id);

        // Delete image files locally
        $uploadDirectory = 'products_images/';
        if (file_exists($uploadDirectory . $image1)) {
            unlink($uploadDirectory . $image1);
        }
        if (file_exists($uploadDirectory . $image2)) {
            unlink($uploadDirectory . $image2);
        }
        if (file_exists($uploadDirectory . $image3)) {
            unlink($uploadDirectory . $image3);
        }

        // Redirect to the list of products page
        header("Location: /Ballers");
    }
}
