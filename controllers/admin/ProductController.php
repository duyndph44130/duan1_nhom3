<?php
require_once '../models/admin/Product.php';
require_once '../models/admin/Category.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {
        $products = $this->model->all();
        include'../views/admin/products/list.php';
    }

    public function create() {
        $categoryModel = new Category();
        $categories = $categoryModel->all();

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Kiểm tra file ảnh
            if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
                $error = "Vui lòng chọn ảnh sản phẩm hợp lệ.";
            } else {
                $file = $_FILES['image'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                if (!in_array($ext, $allowed)) {
                    $error = "Chỉ cho phép các định dạng ảnh: jpg, jpeg, png, gif, webp";
                } else {
                    // Tạo thư mục uploads nếu chưa có
                    $uploadDir = __DIR__ . '/../../public/uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    // Tạo tên file tránh trùng
                    $filename = time() . '_' . basename($file['name']);
                    $targetPath = $uploadDir . $filename;

                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        $data['image'] = $filename;
                        $this->model->insert($data);
                        header('Location: index.php?url=admin/products');
                        exit;
                    } else {
                        $error = "Không thể tải ảnh lên.";
                    }
                }
            }
        }

        include '../views/admin/products/create.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $product = $this->model->find($id);
        $categoryModel = new Category();
        $categories = $categoryModel->all();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Nếu người dùng chọn ảnh mới
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $file = $_FILES['image'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                if (!in_array($ext, $allowed)) {
                    $error = "Ảnh không hợp lệ. Chỉ cho phép jpg, jpeg, png, gif, webp.";
                } else {
                    // Tạo thư mục nếu chưa có
                    $uploadDir = './public/uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    // Tạo tên file mới
                    $filename = time() . '_' . basename($file['name']);
                    $targetPath = $uploadDir . $filename;

                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        $data['image'] = $filename;
                    } else {
                        $error = "Không thể tải ảnh lên.";
                    }
                }
            } else {
                // Nếu không chọn ảnh mới → dùng ảnh cũ
                $data['image'] = $product['image'];
            }

            if (empty($error)) {
                $this->model->update($id, $data);
                header('Location: index.php?url=admin/products');
                exit;
            }
        }

        include '../views/admin/products/edit.php';
    }

    public function delete() {
        $this->model->delete($_GET['id']);
        header('Location: index.php?url=admin/products');
        exit;
    }
}
