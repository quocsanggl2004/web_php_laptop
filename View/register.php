<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/style/css/style_function.css">

</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Đăng Ký</h2>
    <form action="index.php?action=register" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng ký</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Đăng Ký</button>
    </form>
</div>
</body>
</html>