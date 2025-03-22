<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Laptop Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Loại sản phẩm
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $types = $productTypeController->listProductTypes();
                        foreach ($types as $type) {
                            echo '<li><a class="dropdown-item" href="index.php?action=listProductsByType&idLoai=' . $type['IDLoai'] . '">' . $type['TenLoai'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownHang" role="button" data-bs-toggle="dropdown">
                        Tên Hãng
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $brands = $productModel->getAllBrands(); // Phương thức lấy tất cả các thương hiệu
                        foreach ($brands as $brand) {
                            echo '<li><a class="dropdown-item" href="index.php?action=listProductsByBrand&idHang=' . $brand['IDHang'] . '">' . $brand['TenHang'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <form class="d-flex me-3" method="GET" action="index.php">
                <input type="hidden" name="action" value="search">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" name="name" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Tìm</button>
            </form>
            <ul class="navbar-nav">
                <?php if (!isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=login">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=register">Đăng ký</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logout">Đăng xuất</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>