<h2>Quản lý sản phẩm</h2>
<a href="index.php?url=admin/products/create">+ Thêm mới</a>
<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th><th>Tên</th><th>Ảnh</th><th>Giá</th><th>SL</th><th>Danh mục</th><th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['name'] ?></td>
            <td><img src="./public/uploads/<?= $p['image'] ?>" width="60"></td>
            <td><?= $p['price'] ?>₫</td>
            <td><?= $p['quantity'] ?></td>
            <td><?= $p['category_name'] ?></td>
            <td>
                <a href="index.php?url=admin/products/edit&id=<?= $p['id'] ?>">Sửa</a> |
                <a href="index.php?url=admin/products/delete&id=<?= $p['id'] ?>" onclick="return confirm('Xoá sản phẩm này?')">Xoá</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
