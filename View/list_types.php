<div class="container mt-4">
    <h2>Danh Sách Loại Sản Phẩm</h2>
    <ul class="list-group">
        <?php foreach ($types as $type): ?>
            <li class="list-group-item">
                <a href="index.php?action=listProductsByType&idLoai=<?= $type['IDLoai'] ?>">
                    <?= $type['TenLoai'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
