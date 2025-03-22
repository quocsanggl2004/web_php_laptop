<?php
require_once 'config/db.php';

class ProductModel {
    private $conn;

    public function __construct() {
        $db = new clsKetNoi();
        $this->conn = $db->KetNoi();
    }

    public function getAllProductTypes() {
        $query = "SELECT * FROM loaisanpham";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllProducts() {
        $query = "SELECT * FROM sanpham";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByType($idLoai) {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE IDLoai = ?");
        $stmt->bind_param('i', $idLoai);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchProductsByName($name) {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE TenLaptop LIKE ?");
        $name = "%$name%";
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByBrand($idHang) {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE IDHang = ?");
        $stmt->bind_param('i', $idHang);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registerUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param('ss', $username, $hashedPassword);
        return $stmt->execute();
    }

    public function loginUser($username, $password) {
        $stmt = $this->conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result && password_verify($password, $result['password']);
    }

    public function getAllBrands() {
        $query = "SELECT * FROM hangsanpham";
        $result = $this->conn->query($query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}
?>