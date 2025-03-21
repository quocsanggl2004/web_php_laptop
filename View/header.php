<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Quản lý Laptop</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Laptop Shop</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=listProductTypes">Loại sản phẩm</a></li>
            </ul>
            <form class="d-flex" method="GET" action="index.php">
                <input type="hidden" name="action" value="search">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" name="name">
                <button class="btn btn-outline-light" type="submit">Tìm</button>
            </form>
        </div>
    </div>
</nav>
