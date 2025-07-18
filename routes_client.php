<?php
require_once './controllers/client/HomeController.php';
require_once './controllers/client/ProductController.php';
require_once './controllers/client/CartController.php';
// ...

switch ($url) {
    case '':
    case 'home':
        (new HomeController())->index();
        break;
    case 'products':
        (new ProductController())->index();
        break;
    case 'product-detail':
        // (new ProductController())->show();
        break;

    // ...

    default:
        echo "404 - Trang không tồn tại!";
        break;
}
