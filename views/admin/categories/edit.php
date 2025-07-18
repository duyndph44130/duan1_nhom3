<h2>Sửa danh mục</h2>
<form method="post">
    <label>Tên:</label><br>
    <input name="name" value="<?= $category['name'] ?>" required><br>
    <label>Mô tả:</label><br>
    <textarea name="description"><?= $category['description'] ?></textarea><br>
    <button type="submit">Cập nhật</button>
</form>
