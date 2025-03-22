<?php
class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Show login form
    public function showLoginForm($message = '') {
        include './View/login.php';
    }

    // Show registration form
    public function showRegistrationForm($message = '') {
        include './View/register.php';
    }

    // Process login
    public function login($username, $password) {
        $user = $this->userModel->authenticate($username, $password);
        
        if ($user) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['username'] = $user['Username'];
            header('Location: index.php');
            exit;
        }
        
        $this->showLoginForm('Tên đăng nhập hoặc mật khẩu không đúng.');
    }

    // Process registration
    public function register($username, $password) {
        // Chỉ kiểm tra và thực hiện đăng ký
        $this->userModel->registerUser($username, $password);
        $this->showLoginForm('Đăng ký thành công! Vui lòng đăng nhập.');
    }

    // Process logout
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}