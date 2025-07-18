<h2>Sửa sản phẩm</h2>

<form method="post" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br><br>

    <label>Số lượng:</label><br>
    <input type="number" name="quantity" value="<?= $product['quantity'] ?>" min="0" required><br><br>

    <label>Ảnh hiện tại:</label><br>
    <img src="./public/uploads/<?= $product['image'] ?>" width="100"><br><br>

    <label>Thay ảnh mới (nếu có):</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id" required>
        <?php foreach ($categories as $cate): ?>
            <option value="<?= $cate['id'] ?>" <?= $product['category_id'] == $cate['id'] ? 'selected' : '' ?>>
                <?= $cate['name'] ?>
            </option>
        <?php endforeach ?>
    </select><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" rows="4" cols="50"><?= $product['description'] ?></textarea><br><br>

    <button type="submit">Cập nhật sản phẩm</button>
</form>
