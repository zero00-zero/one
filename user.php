<?php
require 'config.php';

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function register($username, $password) {
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'user')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUser($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>