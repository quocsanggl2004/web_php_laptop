<?php
$idHang = $_GET['idHang'] ?? '';
$products = $productController->listProductsByBrand($idHang);
?>
<div class="container mt-4">
    <h2 class="mb-4">Danh Sách Sản Phẩm Theo Hãng</h2>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="View/style/img/<?= $product['HinhAnh'] ?>" class="card-img-top" alt="<?= $product['TenLaptop'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['TenLaptop'] ?></h5>
                        <p class="card-text">
                            <del><?= number_format($product['GiaCu']) ?> VNĐ</del>
                            <strong><?= number_format($product['GiaMoi']) ?> VNĐ</strong>
                        </p>
                        <p class="card-text">Số lượng tồn: <?= $product['SoLuongTon'] ?></p>
                        <button class="btn btn-primary">Mua ngay</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>