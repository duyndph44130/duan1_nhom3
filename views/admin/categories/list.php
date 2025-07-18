<h2>Quản lý danh mục</h2>
<a href="index.php?url=admin/categories/create">+ Thêm mới</a>
<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $cate): ?>
        <tr>
            <td><?= $cate['id'] ?></td>
            <td><?= $cate['name'] ?></td>
            <td><?= $cate['description'] ?></td>
            <td>
                <a href="index.php?url=admin/categories/edit&id=<?= $cate['id'] ?>">Sửa</a> |
                <a href="index.php?url=admin/categories/delete&id=<?= $cate['id'] ?>" onclick="return confirm('Xoá danh mục này?')">Xoá</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
