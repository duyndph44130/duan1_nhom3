<?php
require_once '../models/admin/Role.php';

class RoleController {
    private $model;

    public function __construct() {
        $this->model = new Role();
    }

    public function index() {
        $roles = $this->model->all();
        include '../views/admin/roles/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->insert($_POST['name'], $_POST['level'], $_POST['status']);
            header('Location: index.php?url=admin/roles');
            exit;
        }
        include '../views/admin/roles/create.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $role = $this->model->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST['name'], $_POST['level'], $_POST['status']);
            header('Location: index.php?url=admin/roles');
            exit;
        }

        include '../views/admin/roles/edit.php';
    }

    public function delete() {
        $this->model->delete($_GET['id']);
        header('Location: index.php?url=admin/roles');
        exit;
    }
}
