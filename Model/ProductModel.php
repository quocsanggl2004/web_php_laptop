<?php
require_once 'conn.php';

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

    public function getAllBrands() {
        $query = "SELECT IDHang, TenHang FROM hangsanpham";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByBrand($idHang) {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE IDHang = ?");
        $stmt->bind_param('i', $idHang);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
