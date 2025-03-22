<?php
require_once 'config/db.php';

class UserModel {
    private $conn;

    public function __construct() {
        $db = new clsKetNoi();
        $this->conn = $db->KetNoi();
    }

    public function authenticate($username, $password) {
        // Kiểm tra xem tên đăng nhập tồn tại
        $query = "SELECT password FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($password, $result['password'])) {
            return true; // Đăng nhập thành công
        }
        
        return false; // Đăng nhập thất bại
    }

    public function registerUser($username, $password) {
        // Kiểm tra xem tên đăng nhập đã tồn tại
        $checkQuery = "SELECT * FROM users WHERE username = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param('s', $username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            return false; // Tên đăng nhập đã tồn tại
        }

        // Chèn người dùng mới
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param('ss', $username, $hashedPassword);

        return $stmt->execute(); // Đăng ký thành công hay thất bại
    }
}
?>