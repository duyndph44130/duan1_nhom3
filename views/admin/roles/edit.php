<h2>Sửa vai trò</h2>
<form method="post">
    <label>Tên vai trò:</label><br>
    <input name="name" value="<?= $role['name'] ?>" required><br><br>

    <label>Cấp độ:</label><br>
    <input type="number" name="level" value="<?= $role['level'] ?>" required><br><br>

    <label>Trạng thái:</label><br>
    <select name="status">
        <option value="1" <?= $role['status'] == 1 ? 'selected' : '' ?>>Hiển thị</option>
        <option value="0" <?= $role['status'] == 0 ? 'selected' : '' ?>>Ẩn</option>
    </select><br><br>

    <button type="submit">Cập nhật</button>
</form>
