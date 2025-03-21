<?php
require_once './Model/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
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
