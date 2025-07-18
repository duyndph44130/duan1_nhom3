<?php
require_once '../models/BaseModel.php';

class Role extends BaseModel {
    public function all() {
        return $this->select("SELECT * FROM roles WHERE deleted_at IS NULL ORDER BY level DESC");
    }

    public function find($id) {
        return $this->findOne("SELECT * FROM roles WHERE id = ?", [$id]);
    }

    public function insert($name, $level, $status) {
        $sql = "INSERT INTO roles (name, level, status) VALUES (?, ?, ?)";
        return $this->execute($sql, [$name, $level, $status]);
    }

    public function update($id, $name, $level, $status) {
        $sql = "UPDATE roles SET name = ?, level = ?, status = ? WHERE id = ?";
        return $this->execute($sql, [$name, $level, $status, $id]);
    }

    public function delete($id) {
        $sql = "UPDATE roles SET deleted_at = NOW() WHERE id = ?";
        return $this->execute($sql, [$id]);
    }
}
