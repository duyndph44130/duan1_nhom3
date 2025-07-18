<?php
require_once 'models/client/Product.php';

class HomeController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->all();
        require 'views/client/home/index.php';
    }
}
