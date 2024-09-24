<?php
require 'config.php';

class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function addProduct($name, $description, $price, $stock, $category_id) {
        $sql = "INSERT INTO products (name, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $category_id);
        $stmt->execute();
    }

    public function updateProduct($id, $name, $description, $price, $stock, $category_id) {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdiii", $name, $description, $price, $stock, $category_id, $id);
        $stmt->execute();
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>