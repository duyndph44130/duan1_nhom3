<h2>Sửa thông tin người dùng</h2>

<form method="post">
    <label>Họ tên:</label><br>
    <input type="text" name="full_name" value="<?= $user['full_name'] ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>

    <label>Số điện thoại:</label><br>
    <input type="text" name="phone" value="<?= $user['phone'] ?>"><br><br>

    <label>Giới tính:</label><br>
    <label><input type="radio" name="gender" value="1" <?= $user['gender'] == 1 ? 'checked' : '' ?>> Nam</label>
    <label><input type="radio" name="gender" value="0" <?= $user['gender'] == 0 ? 'checked' : '' ?>> Nữ</label><br><br>

    <label>Vai trò:</label><br>
    <select name="role_id">
        <?php foreach ($roles as $r): ?>
            <option value="<?= $r['id'] ?>"
                <?= isset($user['role_id']) && $user['role_id'] == $r['id'] ? 'selected' : '' ?>>
                <?= $r['name'] ?>
            </option>
        <?php endforeach ?>
    </select>


    <label>Trạng thái:</label><br>
    <select name="status">
        <option value="1" <?= $user['status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
        <option value="0" <?= $user['status'] == 0 ? 'selected' : '' ?>>Khoá</option>
    </select><br><br>

    <button type="submit">Cập nhật</button>
</form>
