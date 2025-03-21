<?php
require_once __DIR__ . '/../Model/ProductModel.php';
require_once __DIR__ . '/../Controller/ProductController.php';
?>
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Đăng ký tài khoản</h4>
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
                            <input type="text" class="form-control" id="username" name="username" required minlength="4">
                            <div class="form-text">Tên đăng nhập phải có ít nhất 4 ký tự.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required minlength="6">
                            <div class="form-text">Mật khẩu phải có ít nhất 6 ký tự.</div>
                        </div>
                        <div