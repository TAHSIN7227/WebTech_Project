<?php
require_once 'user_model.php';

class UserController {
    private $model;

    public function __construct($data) {
        $this->model = new UserModel($data);
    }

    public function updateProfile($name, $phone, $email, $password, $sessionUsername) {
        return $this->model->updateProfile($name, $phone, $email, $password, $sessionUsername);
    }

    public function getUserInfo($username) {
        return $this->model->getUserInfo($username);
    }

    public function getUserBalance($username) {
        return $this->model->getUserBalance($username);
    }
}
?>