<?php
require_once './model/mProducts.php';

class ProductTypeController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function listProductTypes() {
        return $this->productModel->getAllProductTypes();
    }
}
?>