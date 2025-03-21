<?php
session_start();
require_once './Model/mProducts.php';
require_once './Controller/cProducts.php';

$productModel = new ProductModel();
$productController = new ProductController();

$action = $_GET['action'] ?? 'home';

// Xử lý đăng ký
if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($productModel->registerUser($username, $password)) {
        echo "<script>alert('Đăng ký thành công!'); window.location.href='index.php?action=login';</script>";
    } else {
        echo "<script>alert('Tên đăng nhập đã tồn tại!'); window.history.back();</script>";
    }
}

// Xử lý đăng nhập
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($productModel->loginUser($username, $password)) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Đăng nhập thành công!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!'); window.history.back();</script>";
    }
}

// Xử lý đăng xuất
if ($action === 'logout') {
    session_destroy();
    echo "<script>alert('Đã đăng xuất!'); window.location.href='index.php';</script>";
}

// Load giao diện
require 'View/header.php';
require 'View/menu.php';

switch ($action) {
    case 'login':
        require 'View/login.php';
        break;
    case 'register':
        require 'View/register.php';
        break;
    case 'listProductsByType':
        $idLoai = $_GET['idLoai'] ?? '';
        $productController->listProductsByType($idLoai);
        break;
    case 'listProductsByBrand':
        $idHang = $_GET['idHang'] ?? '';
        $productController->listProductsByBrand($idHang);
        break;
    case 'search':
        $name = $_GET['name'] ?? '';
        $productController->searchProducts($name);
        break;
    default:
        $productController->listProducts();
        break;
}

require 'View/footer.php';
