<?php
require_once './model/mProducts.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function listProducts() {
        return $this->productModel->getAllProducts();
    }

    public function listProductsByType($idLoai) {
        return $this->productModel->getProductsByType($idLoai);
    }

    public function searchProducts($name) {
        return $this->productModel->searchProductsByName($name);
    }

    public function listProductsByBrand($idHang) {
        return $this->productModel->getProductsByBrand($idHang);
    }
}
?>