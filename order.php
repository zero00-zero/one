<?php
require 'config.php';

class Order {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getOrders() {
        $sql = "SELECT * FROM orders";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function addOrder($product_id, $supplier_id, $order_date, $quantity, $total_cost) {
        $sql = "INSERT INTO orders (product_id, supplier_id, order_date, quantity, total_cost) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiiss", $product_id, $supplier_id, $order_date, $quantity, $total_cost);
        $stmt->execute();
    }

    public function updateOrder($id, $product_id, $supplier_id, $order_date, $quantity, $total_cost) {
        $sql = "UPDATE orders SET product_id = ?, supplier_id = ?, order_date = ?, quantity = ?, total_cost = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiissi", $product_id, $supplier_id, $order_date, $quantity, $total_cost, $id);
        $stmt->execute();
    }

    public function deleteOrder($id) {
        $sql = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>