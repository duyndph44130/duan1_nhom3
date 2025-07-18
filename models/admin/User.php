<?php
require_once '../models/BaseModel.php';

class User extends BaseModel {
    public function all() {
        $sql = "SELECT u.*, r.name AS role_name 
                FROM users u 
                LEFT JOIN roles r ON u.role_id = r.id 
                WHERE u.deleted_at IS NULL";
        return $this->select($sql);
    }

    public function findByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        return $this->findOne($sql, [$username]);
    }


    public function find($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->findOne($sql, [$id]);
    }

    public function insert($data) {
        $sql = "INSERT INTO users (username, full_name, email, password, phone, gender, role_id, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->execute($sql, [
            $data['username'],
            $data['full_name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['phone'],
            $data['gender'],
            $data['role_id'],
            $data['status']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE users SET full_name=?, email=?, phone=?, gender=?, role_id=?, status=? WHERE id = ?";
        return $this->execute($sql, [
            $data['full_name'],
            $data['email'],
            $data['phone'],
            $data['gender'],
            $data['role_id'],
            $data['status'],
            $id
        ]);
    }

    public function delete($id) {
        $sql = "UPDATE users SET deleted_at = NOW() WHERE id = ?";
        return $this->execute($sql, [$id]);
    }
}
