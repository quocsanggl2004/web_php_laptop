<?php
require_once './Controller/ProductController.php';
$productController = new ProductController();
$action = isset($_GET['action']) ? $_GET['action'] : '';

include './View/header.php';

switch ($action) {
    case 'listProductsByType':
        $idLoai = isset($_GET['idLoai']) ? $_GET['idLoai'] : '';
        $productController->listProductsByType($idLoai);
        break;

    case 'listProductsByBrand':
        $idHang = isset($_GET['idHang']) ? $_GET['idHang'] : '';
        $productController->listProductsByBrand($idHang);
        break;
        
    case 'search':
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $productController->searchProducts($name);
        break;

    default:
        $productController->listProducts();
        break;
}

include './View/footer.php';
?>
