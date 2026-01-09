<?php
// app/Controllers/AuthController.php

// Ensure the User Model is included
require_once __DIR__ . '/../Models/User.php'; 

class AuthController {
    private $userModel;
    
    public function signup() {
        // Load the view for the sign-up form
        include __DIR__ . '/../Views/signup.php';
    }
    // The constructor initializes the User Model with the database connection
    public function __construct($db) {
        // Assuming $db is passed and used to initialize the User Model
        $this->userModel = new User($db); 
    }

    /**
     * Renders the login form (app/Views/login.php)
     */
    public function login() {
        // Load the view for the login form
        include __DIR__ . '/../Views/login.php';
    }

    /**
     * Handles the login form submission using 'email' for login.
     */
    public function handleSignIn() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            return;
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['mot_de_passe'] ?? ''; // Use the French field name

        // 1. Fetch user data (including the role name) from the database
        // This relies on a findByEmail method in your User Model that joins with the 'role' table.
        $user = $this->userModel->findByEmail($email); 

        if ($user) {
            // 2. Verify the submitted password against the stored hash
            if (password_verify($password, $user['mot_de_passe'])) {
                
                // 3. SUCCESS: Start Session and store user data
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['prenom'] = $user['prenom']; 
                $_SESSION['role'] = $user['role_name']; // IMPORTANT: Must be the actual role name (e.g., 'admin')
                
                // 4. Redirect based on role
                if ($_SESSION['role'] === 'admin') {
                    // Redirect Admins to the product management dashboard
                    header('Location: /admin/products');
                } else {
                    // Redirect other users (customers) to the main site
                    header('Location: /gestion_produit/app/index.php?action=menu');
                }
                exit();
            }
        }

        // FAILURE: Redirect back to login with an error message
        header('Location: /login?error=invalid');
        exit();
    }

    /**
     * Handles the user sign up form submission (Create a new utilisateur)
     */
    public function handleSignUp() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /signup');
            return;
        }

        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['mot_de_passe'] ?? '';

        // Basic validation and checking if email already exists should happen here...

        // Call the Model to create the user (Assuming default role is customer, e.g., role_id = 2)
        if ($this->userModel->create($nom, $prenom, $email, $password, 2)) {
            // Success: Redirect to login page
            header('Location: /gestion_produit/app/index.php?action=login&success=registered');
        } else {
            // Failure (e.g., email already exists)
            header('Location: /gestion_produit/app/index.php?action=signup&error=registration_failed');
        }
        exit();
    }

    /**
     * Destroys the session and logs the user out
     */
    public function logout() {
        // Start the session if it hasn't started yet
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        session_unset(); // Remove session variables
        session_destroy(); // Destroy the session

        header('Location: /'); // Redirect to the homepage
        exit();
    }
}