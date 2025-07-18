<?php
require_once '../controllers/admin/CategoryController.php';
require_once '../controllers/admin/ProductController.php';
require_once '../controllers/admin/UserController.php';
require_once '../controllers/admin/RoleController.php';

$url = $_GET['url'] ?? '';

switch ($url) {
    case 'admin/categories':
        (new CategoryController())->index();
        break;
    case 'admin/categories/create':
        (new CategoryController())->create();
        break;
    case 'admin/categories/edit':
        (new CategoryController())->edit();
        break;
    case 'admin/categories/delete':
        (new CategoryController())->delete();
        break;
    case 'admin/products':
        (new ProductController())->index();
        break;
    case 'admin/products/create':
        (new ProductController())->create();
        break;
    case 'admin/products/edit':
        (new ProductController())->edit();
        break;
    case 'admin/products/delete':
        (new ProductController())->delete();
        break;
        case 'admin/users':
        (new UserController())->index();
        break;
    case 'admin/users/create':
        (new UserController())->create();
        break;
    case 'admin/users/edit':
        (new UserController())->edit();
        break;
    case 'admin/users/delete':
        (new UserController())->delete();
        break;
    case 'admin/roles':
        (new RoleController())->index();
        break;
    case 'admin/roles/create':
        (new RoleController())->create();
        break;
    case 'admin/roles/edit':
        (new RoleController())->edit();
        break;
    case 'admin/roles/delete':
        (new RoleController())->delete();
        break;
    default:
        echo "Không tìm thấy đường dẫn admin";
}
