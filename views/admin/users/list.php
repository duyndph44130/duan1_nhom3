<h2>Quản lý người dùng</h2>
<a href="index.php?url=admin/users/create">+ Thêm tài khoản</a>

<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th><th>Tên đăng nhập</th><th>Họ tên</th><th>Email</th>
            <th>Điện thoại</th><th>Giới tính</th><th>Vai trò</th><th>Trạng thái</th><th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['username'] ?></td>
            <td><?= $u['full_name'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['phone'] ?></td>
            <td><?= $u['gender'] == 1 ? 'Nam' : 'Nữ' ?></td>
            <td><?= $u['role_name'] ?></td>
            <td><?= $u['status'] ? 'Hoạt động' : 'Khoá' ?></td>
            <td>
                <a href="index.php?url=admin/users/edit&id=<?= $u['id'] ?>">Sửa</a> |
                <a href="index.php?url=admin/users/delete&id=<?= $u['id'] ?>" onclick="return confirm('Xoá người dùng này?')">Xoá</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
