<?php
require_once './model/mUser.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register($username, $password) {
        return $this->userModel->registerUser($username, $password);
    }

    public function login($username, $password) {
        return $this->userModel->authenticate($username, $password);
    }

    public function logout() {
        session_destroy();
    }
}
?>