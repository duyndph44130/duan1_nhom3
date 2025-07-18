<?php
require_once '../models/admin/User.php';
require_once '../models/admin/Role.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function index() {
        $users = $this->model->all();
        include '../views/admin/users/list.php';
    }

    public function create() {
        $roleModel = new Role();
        $roles = $roleModel->all();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            $existingUser = $this->model->findByUsername($data['username']);
            if ($existingUser) {
                $error = "Tên đăng nhập đã tồn tại.";
            } elseif (strlen($data['password']) < 6) {
                $error = "Mật khẩu tối thiểu 6 ký tự.";
            } else {
                $this->model->insert($data);
                header('Location: index.php?url=admin/users');
                exit;
            }
        }

        include __DIR__ . '/../../views/admin/users/create.php';
    }



    public function edit() {
        $id = $_GET['id'];
        $user = $this->model->find($id);
        $roleModel = new Role();
        $roles = $roleModel->all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header('Location: index.php?url=admin/users');
            exit;
        }

        include __DIR__ . '/../../views/admin/users/edit.php';
    }


    public function delete() {
        $this->model->delete($_GET['id']);
        header('Location: index.php?url=admin/users');
        exit;
    }
}
