<?php

class UserController {
    private $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['new-username'];
            $password = $_POST['new-password'];
            $email = $_POST['new-email'];

    
            if ($this->userManager->userExists($username)) {
           
            } else {
   
                $this->userManager->createUser($username, $password, $email);

    
                header("Location: /login");
            }
        } else {

            $view = new View('Register');
            $view->generate(['title' => 'Inscription']);
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->userManager->checkUserCredentials($username, $password)) {
                $userRole = $this->userManager->getUserRole($username);

                session_start();
                $_SESSION['userIsLoggedIn'] = true;
                $_SESSION['userRole'] = $userRole;
                $_SESSION['user_id'] = $this->userManager->getUserId($username);
               
                header("Location: /Ballers");
            } else {
                $view = new View('Login');
                $view->generate(['title' => 'Connexion', 'errorMessage' => 'Nom d\'utilisateur ou mot de passe incorrect']);
            }
        } else {
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
