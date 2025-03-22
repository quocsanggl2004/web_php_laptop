<div class="container mt-4">
    <h2 class="mb-4">Kết Quả Tìm Kiếm: <?= htmlentities($name) ?></h2>
    <div class="row">
        <?php if (empty($products)): ?>
            <p>Không tìm thấy sản phẩm nào.</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="View/style/img/<?= htmlentities($product['HinhAnh']) ?>" class="card-img-top" alt="<?= htmlentities($product['TenLaptop']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlentities($product['TenLaptop']) ?></h5>
                            <p class="card-text">
                                <del><?= number_format($product['GiaCu']) ?> VNĐ</del>
                                <strong><?= number_format($product['GiaMoi']) ?> VNĐ</strong>
                            </p>
                            <p class="card-text">Số lượng tồn: <?= htmlentities($product['SoLuongTon']) ?></p>
                            <button class="btn btn-primary">Mua ngay</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>