<?php
require_once __DIR__ . '/../Model/ProductModel.php';
require_once __DIR__ . '/../Controller/ProductController.php';
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Đăng nhập</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $message ?>
                    </div>
                    <?php endif; ?>
                    
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <input type="hidden" name="login" value="1">
                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </form>
                    
                    <div class="mt-3 text-center">
                        <p>Chưa có tài khoản? <a href="index.php?action=register">Đăng ký ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Ensure the PHP tag is properly closed
?>