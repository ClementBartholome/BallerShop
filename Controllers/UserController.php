<?php

class UserController {
    private $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    public function register() {
        // Vérifier si le formulaire d'inscription a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['new-username'];
            $password = $_POST['new-password'];
            $email = $_POST['new-email'];

            // Vérifier si l'utilisateur existe déjà
            if ($this->userManager->userExists($username)) {
                // Gérer l'erreur d'utilisateur existant
                // Vous pouvez rediriger vers une page d'erreur d'inscription
            } else {
                // Créer un nouvel utilisateur
                $this->userManager->createUser($username, $password, $email);

                // Rediriger vers la page de connexion
                header("Location: /login");
            }
        } else {
            // Afficher le formulaire d'inscription
            $view = new View('Register');
            $view->generate(['title' => 'Inscription']);
        }
    }

    public function login() {
        // Vérifier si le formulaire de connexion a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];


            // Vérifier les informations d'identification de l'utilisateur
            if ($this->userManager->checkUserCredentials($username, $password)) {
                $userRole = $this->userManager->getUserRole($username);

            
                session_start();
                $_SESSION['userIsLoggedIn'] = true;
                $_SESSION['userRole'] = $userRole;
               
                header("Location: /Ballers");
            } else {
                // Gérer l'erreur d'authentification invalide
                // Vous pouvez rediriger vers une page d'erreur de connexion
            }
        } else {
            // Afficher le formulaire de connexion
            $view = new View('Login');
            $view->generate(['title' => 'Connexion']);
        }
    }

    public function logout() {
        session_unset(); 
        session_destroy();  
        header("Location: /Ballers");
    }
}
