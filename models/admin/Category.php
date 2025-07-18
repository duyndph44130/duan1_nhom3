<?php
require_once '../models/BaseModel.php';

class Category extends BaseModel {
    public function all() {
        $sql = "SELECT * FROM categories WHERE deleted_at IS NULL ORDER BY created_at DESC";
        return $this->select($sql);
    }

    public function find($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        return $this->findOne($sql, [$id]);
    }

    public function insert($name, $desc) {
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        return $this->execute($sql, [$name, $desc]);
    }

    public function update($id, $name, $desc) {
        $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        return $this->execute($sql, [$name, $desc, $id]);
    }

    public function delete($id) {
        $sql = "UPDATE categories SET deleted_at = NOW() WHERE id = ?";
        return $this->execute($sql, [$id]);
    }
}
