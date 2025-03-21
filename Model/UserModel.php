

<?php

require_once __DIR__ . '/conn.php';

class UserModel {
    private $conn;
    private $db;

    public function __construct() {
        $this->db = new clsKetNoi();
        $this->conn = $this->db->KetNoi();
    }

    public function __destruct() {
        $this->db->DongKetNoi();
    }

    // Authenticate user
    public function authenticate($username, $password) {
        $query = "SELECT * FROM Users WHERE Username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $hashedPassword = md5($password);
            
            if ($hashedPassword === $user['Password']) {
                return $user;
            }
        }
        
        return false;
    }
    
    // Register new user
    public function registerUser($username, $password) {
        // Check if username already exists
        $checkQuery = "SELECT * FROM Users WHERE Username = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param('s', $username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        
        if ($result->num_rows > 0) {
            return false; // Username already exists
        }
        
        // Insert new user
        $query = "INSERT INTO Users (Username, Password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = md5($password);
        $stmt->bind_param('ss', $username, $hashedPassword);
        
        if ($stmt->execute()) {
            return true; // Registration successful
        }
        
        return false; // Registration failed
    }
}
?>