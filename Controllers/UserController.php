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

            // Check if the username already exists
            if ($this->userManager->userExists($username)) {
                // Display registration form with an error message
                $view = new View('Register');
                $view->generate(['title' => 'Registration', 'errorMessage' => 'Le nom d\'utilisateur est déjà pris']);
            } else {
                // Create a new user
                $this->userManager->createUser($username, $password, $email);

                // Redirect to the login page after successful registration
                header("Location: /login");
            }
        } else {
            // Display the registration form
            $view = new View('Register');
            $view->generate(['title' => 'Registration']);
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check user credentials
            if ($this->userManager->checkUserCredentials($username, $password)) {
                $userRole = $this->userManager->getUserRole($username);

                // Start a session and set user information
                session_start();
                $_SESSION['userIsLoggedIn'] = true;
                $_SESSION['userRole'] = $userRole;
                $_SESSION['user_id'] = $this->userManager->getUserId($username);

                // Redirect to the home page after successful login
                header("Location: /Ballers");
            } else {
                // Display login form with an error message
                $view = new View('Login');
                $view->generate(['title' => 'Login', 'errorMessage' => 'Nom d\'utilisateur ou mot de passe incorrect']);
            }
        } else {
            // Display the login form
            $view = new View('Login');
            $view->generate(['title' => 'Login']);
        }
    }


    public function logout() {
        // Unset and destroy the session to log out the user
        session_unset();
        session_destroy();
        
        // Redirect to the home page after logout
        header("Location: /Ballers");
    }
}
