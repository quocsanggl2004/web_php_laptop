<?php

session_start();
require_once './model/mProducts.php';
require_once './model/mUser.php';
require_once './controller/cProducts.php';
require_once './controller/cUser.php';
require_once './controller/cProductType.php';

$productModel = new ProductModel();
$userController = new UserController();
$productController = new ProductController();
$productTypeController = new ProductTypeController();

$action = $_GET['action'] ?? 'home';

// Xử lý các hành động liên quan đến người dùng
if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $success = $userController->register($username, $password);
    if ($success) {
        echo "<script>alert('Đăng ký thành công!'); window.location.href='index.php?action=login';</script>";
    } else {
        echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
    }
}

if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $user = $userController->login($username, $password);
    if ($user) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Đăng nhập thành công!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!');</script>";
    }
}

if ($action === 'logout') {
    $userController->logout();
    echo "<script>alert('Đã đăng xuất!'); window.location.href='index.php';</script>";
}

// Load views
require 'view/layout/header.php';
require 'view/layout/menu.php';

switch ($action) {
    case 'login':
        require './view/login.php';
        break;
    case 'register':
        require './view/register.php';
        break;
    case 'listProductsByType':
        $idLoai = $_GET['idLoai'] ?? null;
        $products = $productController->listProductsByType($idLoai);
        require './view/list_product_by_type.php';
        break;
    case 'listProductsByBrand':
        $idHang = $_GET['idHang'] ?? null;
        $products = $productController->listProductsByBrand($idHang);
        require './view/list_product_by_brand.php';
        break;
    case 'search':
        $name = $_GET['name'] ?? '';
        $products = $productController->searchProducts($name);
        require './view/search_product_name.php';
        break;
    default:
        $products = $productController->listProducts();
        require './view/list_products.php';
        break;
}

require 'view/layout/footer.php';
?>