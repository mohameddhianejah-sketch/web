<?php
// GESTION_PRODUIT/index.php

// 1. Start the Session (Essential for Login/Logout)
// session_start(); 
// NOTE: If you are starting the session elsewhere (e.g., in a bootstrap file), omit this line.
// But it is mandatory for AuthController to work.

// 2. Database Connection Setup (The $db object)
// This file must define and initialize a $db (PDO) connection object.
require_once __DIR__ . '/../config/database.php';
// 3. Include ALL Controllers
require_once __DIR__ . '/Controllers/ProductController.php';
require_once __DIR__ . '/Controllers/AuthController.php';


// 4. Controller Instantiation
// CRITICAL: Controllers must receive the database connection ($db)
$productController = new ProductController($db); 
$authController = new AuthController($db);

// 5. Get the Action and ID from the URL Query String
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null; // Important for actions like view, edit, or delete


// 6. Routing Switch Statement (Dispatching Request)
switch ($action) {
    case 'registration_failed': 
    // Handles the form POST submission from signup.php
    $authController->handleSignUp();
    break;
    case 'menu':
        $productController->menu(); // Public menu page
        break;  
    // --- AUTHENTICATION ACTIONS (Handled by AuthController) ---
    case 'login':
        // Display the login form
        $authController->login();
        break;
    case 'signin': 
        // Handles the form POST submission from login.php
        $authController->handleSignIn();
        break;
    case 'signup':
        // Display the signup form
        $authController->signup(); 
        break;
    case 'register': 
        // Handles the form POST submission from signup.php
        $authController->handleSignUp();
        break;
    case 'logout':
        $authController->logout();
        break;
    
    // --- PRODUCT MANAGEMENT / E-COMMERCE ACTIONS (Handled by ProductController) ---
    case 'index':
        $productController->index(); // Public product listing page
        break;
    case 'admin_index':
        $productController->indexAdmin(); // Secured product management dashboard
        break;
    case 'create':
        $productController->create(); // Display the creation form (secured)
        break;
    case 'store':
        $productController->store(); // Handle the creation form submission (secured)
        break;
    case 'edit':
        $productController->edit($id); // Display the edit form (secured)
        break;
    case 'update':
        $productController->update($id); // Handle the update form submission (secured)
        break;
    case 'delete':
        $productController->delete($id); // Handle product deletion (secured)
        break;
    
    // --- DEFAULT ACTION ---
    default:
        // Default page if action is not recognized
        $productController->index();
        break;
}
?>