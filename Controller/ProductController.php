<?php
require_once './Model/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function listProductTypes() {
        $types = $this->productModel->getAllProductTypes();
        include './View/list_types.php';
    }

    public function listProducts() {
        $products = $this->productModel->getAllProducts();
        include './View/list_products.php';
    }

    public function listProductsByType($idLoai) {
        $products = $this->productModel->getProductsByType($idLoai);
        include './View/list_products.php';
    }

    public function searchProducts($name) {
        $products = $this->productModel->searchProductsByName($name);
        include './View/list_products.php';
    }
}
?>
