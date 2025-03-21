<?php
require_once './Model/ProductModel.php';
$productModel = new ProductModel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Quản lý Laptop</title>

</head>
<body>
<div class="content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Laptop Shop</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>

                    <!-- Submenu Loại sản phẩm -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Loại sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $types = $productModel->getAllProductTypes();
                            foreach ($types as $type) {
                                echo '<li><a class="dropdown-item" href="index.php?action=listProductsByType&idLoai=' . $type['IDLoai'] . '">' . $type['TenLoai'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>

                    <!-- Submenu Tên Hãng -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownHang" role="button" data-bs-toggle="dropdown">
                            Tên Hãng
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $brands = $productModel->getAllBrands();
                            foreach ($brands as $brand) {
                                echo '<li><a class="dropdown-item" href="index.php?action=listProductsByBrand&idHang=' . $brand['IDHang'] . '">' . $brand['TenHang'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>

                <!-- Thanh tìm kiếm -->
                <form class="d-flex me-3" method="GET" action="index.php">
                    <input type="hidden" name="action" value="search">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" name="name">
                    <button class="btn btn-outline-light" type="submit">Tìm</button>
                </form>

                <!-- Đăng nhập/Đăng ký/Đăng xuất -->
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION['username'])): ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=login">Đăng nhập</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=register">Đăng ký</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=logout">Đăng xuất</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

</body>
</html>