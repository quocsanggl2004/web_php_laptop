<?php
require_once './Model/mProducts.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->productModel->loginUser($username, $password)) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Đăng nhập thành công!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!'); window.history.back();</script>";
            }
        } else {
            require './View/login.php';
        }
    }

    public function handleRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->productModel->registerUser($username, $password)) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href='index.php?action=login';</script>";
            } else {
                echo "<script>alert('Tên đăng nhập đã tồn tại!'); window.history.back();</script>";
            }
        } else {
            require './View/register.php';
        }
    }

    public function handleLogout() {
        session_destroy();
        echo "<script>alert('Đã đăng xuất!'); window.location.href='index.php';</script>";
    }

    public function listProducts() {
        $products = $this->productModel->getAllProducts();
        $types = $this->productModel->getAllProductTypes();
        include './View/list_products.php';
    }

    public function listProductsByType($idLoai) {
        $products = $this->productModel->getProductsByType($idLoai);
        $types = $this->productModel->getAllProductTypes();
        include './View/list_products.php';
    }

    public function searchProducts($name) {
        $products = $this->productModel->searchProductsByName($name);
        $types = $this->productModel->getAllProductTypes();
        include './View/list_products.php';
    }

    public function listProductsByBrand($idHang) {
        $products = $this->productModel->getProductsByBrand($idHang);
        $types = $this->productModel->getAllProductTypes();
        include './View/list_products.php';
    }
}
?>
