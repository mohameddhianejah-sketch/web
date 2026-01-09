<?php
// app/Controllers/ProductController.php

// The path below must be corrected to match your structure.
// If ProductController.php is inside app/Controllers, use:
require_once __DIR__ . '/../Models/Product.php'; 
// If your index.php is in the root, and ProductController.php is in app/Controllers, the index.php handles the includes.
// For now, let's trust the index.php router handles required_once for controllers.

class ProductController {
    // 1. Remove redundant properties. Keep only the Model instance.
    private $productModel;
    
    // 2. Add property for User Model if needed, but for now, rely on session.

    public function __construct($db) {
        // Correct instantiation of the Product Model
        $this->productModel = new Product($db); 
    }

    /**
     * ⚠️ SECURITY CHECK: Private method to verify if the current user is an 'admin'.
     * This is essential before allowing access to product management methods (like indexAdmin, create, store, etc.).
     */
    private function isAdmin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin');
    }

    // ------------------------------------------------------------------
    // PUBLIC ACTIONS (E-commerce Frontend)
    // ------------------------------------------------------------------

    public function index() {
        // Fetch product data using the corrected model property
        $stmt = $this->productModel->readAll(); // Assumes readAll() exists and returns a PDOStatement
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../Views/main.php';
    }

    public function menu() {
        // Fetch product data
        $stmt = $this->productModel->readAll(); 
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../Views/menu.php';
    }
    
    // ------------------------------------------------------------------
    // VIEW RENDERING (The AuthController should handle the form submission logic)
    // ------------------------------------------------------------------
    
    // ⚠️ These methods should ideally live in AuthController.php,
    // as per our previous plan, but they render the views:

    public function login() {
        // ⚠️ FIX: No need to fetch products to show a login form.
        include __DIR__ . '/../Views/login.php';
    }

    public function signup() {
        // ⚠️ FIX: No need to fetch products to show a signup form.
        include __DIR__ . '/../Views/signup.php';
    }

    // ------------------------------------------------------------------
    // ADMIN ACTIONS (Your main goal: Gestion de Produit)
    // ------------------------------------------------------------------

    public function indexAdmin() {
        // 1. SECURITY CHECK
        if (!$this->isAdmin()) {
            header('Location: index.php?action=login&error=admin_denied'); 
            exit();
        }
        
        // 2. Fetch data only if admin
        $stmt = $this->productModel->readAll();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 3. Load secured view
        include __DIR__ . '/../Views/admin/product_list.php';
    }

    // Add placeholders for the CRUD methods we need next
    
    public function create() {
        if (!$this->isAdmin()) {
            header('Location: index.php?action=login&error=admin_denied'); exit();
        }
        // Load the product creation form
        include __DIR__ . '/../Views/admin/product_create.php';
    }

    public function store() {
        if (!$this->isAdmin()) {
            header('Location: index.php?action=login&error=admin_denied'); exit();
        }
        // Handle POST data and call $this->productModel->create($_POST);
    }
}