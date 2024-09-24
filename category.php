<?php
require 'config.php';

class Category {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getCategories() {
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function addCategory($name, $description) {
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $name, $description);
        $stmt->execute();
    }

    public function updateCategory($id, $name, $description) {
        $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $description, $id);
        $stmt->execute();
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>