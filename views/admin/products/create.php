<h2>Thêm sản phẩm mới</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" required><br><br>

    <label>Số lượng:</label><br>
    <input type="number" name="quantity" min="0" required><br><br>

    <label>Ảnh:</label><br>
    <input type="file" name="image" accept="image/*" required><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id" required>
        <option value="">-- Chọn danh mục --</option>
        <?php foreach ($categories as $cate): ?>
            <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
        <?php endforeach ?>
    </select><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" rows="4" cols="50"></textarea><br><br>

    <button type="submit">Lưu sản phẩm</button>
</form>
