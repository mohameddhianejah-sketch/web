<?php
class Product {
    private $conn;
    private $table = "produit";
    public $id;
    public $name;
    public $price;
    public $description;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY id";
        $stmt = $this->conn->prepare($query);
		
        $stmt->execute();
        return $stmt;
    }
 
    


}
?>



























