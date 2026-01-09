<?php
// app/Models/User.php

class User {
    private $conn;
    private $userTable = 'utilisateur';
    private $roleTable = 'role';

    // The constructor receives the database connection object
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Finds a user by email and joins with the role table to get the role name.
     * Required for secure sign-in (handleSignIn).
     */
    public function findByEmail($email) {
        $query = 'SELECT 
                    u.id, 
                    u.prenom, 
                    u.mot_de_passe, 
                    r.nom_du_role AS role_name 
                  FROM ' . $this->userTable . ' u
                  JOIN ' . $this->roleTable . ' r 
                    ON u.role_id = r.id
                  WHERE 
                    u.email = :email
                  LIMIT 1';

        // Prepare the statement
        $stmt = $this->conn->prepare($query);

        // Sanitize and bind the email parameter
        $email = htmlspecialchars(strip_tags($email));
        $stmt->bindParam(':email', $email);

        // Execute the statement
        $stmt->execute();

        // Return the user data as an associative array
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Creates a new user (Handles sign-up).
     * The role_id is typically hardcoded here for a 'customer' role (e.g., ID 2).
     */
    public function create($nom, $prenom, $email, $password, $role_id) {
        $query = 'INSERT INTO ' . $this->userTable . ' 
                  (nom, prenom, email, mot_de_passe, role_id)
                  VALUES (:nom, :prenom, :email, :pass, :role_id)';

        // Prepare the statement
        $stmt = $this->conn->prepare($query);

        // HASH the password before storing it (CRUCIAL SECURITY STEP)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Sanitize data
        $nom = htmlspecialchars(strip_tags($nom));
        $prenom = htmlspecialchars(strip_tags($prenom));
        $email = htmlspecialchars(strip_tags($email));

        // Bind parameters
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $hashed_password);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            // Handle errors, e.g., duplicate email constraint violation
            // For production, log the error instead of echoing it
            // echo "Error creating user: " . $e->getMessage();
            return false;
        }
    }
}