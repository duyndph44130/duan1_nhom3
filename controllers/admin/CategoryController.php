<?php
require_once '../models/admin/Category.php';

class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new Category();
    }

    public function index() {
        $categories = $this->model->all();
        include '../views/admin/categories/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insert($_POST['name'], $_POST['description']);
            header('Location: index.php?url=admin/categories');
            exit;
        }
        include '../views/admin/categories/create.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $category = $this->model->find($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($id, $_POST['name'], $_POST['description']);
            header('Location: index.php?url=admin/categories');
            exit;
        }

        include '../views/admin/categories/edit.php';
    }

    public function delete() {
        $this->model->delete($_GET['id']);
        header('Location: index.php?url=admin/categories');
        exit;
    }
}
