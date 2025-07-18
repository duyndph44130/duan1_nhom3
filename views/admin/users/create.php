<h2>Thêm người dùng mới</h2>

<?php if (!empty($error)): ?>
    <p style="color: red"><?= $error ?></p>
<?php endif; ?>

<form method="post">
    <label>Tên đăng nhập:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Họ tên:</label><br>
    <input type="text" name="full_name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Số điện thoại:</label><br>
    <input type="text" name="phone"><br><br>

    <label>Giới tính:</label><br>
    <label><input type="radio" name="gender" value="1" checked> Nam</label>
    <label><input type="radio" name="gender" value="0"> Nữ</label><br><br>

    <label>Vai trò:</label><br>
    <select name="role_id">
        <?php foreach ($roles as $r): ?>
            <option value="<?= $r['id'] ?>"
                <?= isset($user['role_id']) && $user['role_id'] == $r['id'] ? 'selected' : '' ?>>
                <?= $r['name'] ?>
            </option>
        <?php endforeach ?>
    </select>
    <br><br>


    <label>Trạng thái:</label><br>
    <select name="status">
        <option value="1">Hoạt động</option>
        <option value="0">Khoá</option>
    </select><br><br>

    <button type="submit">Tạo tài khoản</button>
</form>
