<?php
// config/database.php

// Database configuration variables
$host = 'localhost';
$db_name = 'gestion_produit'; 
$username = 'root';
$password = ''; 

try {
    // Create a PDO connection object ($db)
    $db = new PDO(
        "mysql:host=$host;dbname=$db_name;charset=utf8",
        $username,
        $password
    );
    
    // Set PDO attributes for better error handling
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection error: " . $e->getMessage());
}
?>