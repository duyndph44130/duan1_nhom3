<?php
require_once '../models/BaseModel.php';

class Product extends BaseModel {
    public function all() {
        $sql = "SELECT p.*, c.name AS category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.deleted_at IS NULL 
                ORDER BY p.created_at DESC";
        return $this->select($sql);
    }
    public function find($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        return $this->findOne($sql, [$id]);
    }

    public function insert($data) {
        $sql = "INSERT INTO products (name, price, description, image, quantity, category_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        return $this->execute($sql, [
            $data['name'],
            $data['price'],
            $data['description'],
            $data['image'],
            $data['quantity'],
            $data['category_id']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, image = ?, quantity = ?, category_id = ? 
                WHERE id = ?";
        return $this->execute($sql, [
            $data['name'],
            $data['price'],
            $data['description'],
            $data['image'],
            $data['quantity'],
            $data['category_id'],
            $id
        ]);
    }

    public function delete($id) {
        $sql = "UPDATE products SET deleted_at = NOW() WHERE id = ?";
        return $this->execute($sql, [$id]);
    }

}
