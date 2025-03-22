<?php
session_start();
require_once './Model/mProducts.php';
require_once './Controller/cProducts.php';

$productController = new ProductController();

$action = $_GET['action'] ?? 'home';
require 'View/layout/header.php';
require 'View/layout/menu.php';
// Xử lý các hành động
switch ($action) {
    case 'login':
        $productController->handleLogin();
        break;
    case 'register':
        $productController->handleRegister();
        break;
    case 'logout':
        $productController->handleLogout();
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



require 'View/layout/footer.php';
