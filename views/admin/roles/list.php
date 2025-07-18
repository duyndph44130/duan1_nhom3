<h2>Quản lý vai trò</h2>
<a href="index.php?url=admin/roles/create">+ Thêm vai trò</a>
<table border="1" cellpadding="6">
    <tr>
        <th>ID</th><th>Tên</th><th>Cấp độ</th><th>Trạng thái</th><th>Hành động</th>
    </tr>
    <?php foreach ($roles as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['name'] ?></td>
            <td><?= $r['level'] ?></td>
            <td><?= $r['status'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
            <td>
                <a href="index.php?url=admin/roles/edit&id=<?= $r['id'] ?>">Sửa</a> |
                <a href="index.php?url=admin/roles/delete&id=<?= $r['id'] ?>" onclick="return confirm('Xoá vai trò này?')">Xoá</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
