<?php
require_once 'models/EmployerModel.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new EmployerModel();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'employer_name' => $_POST['employer_name'],
                'company_name' => $_POST['company_name'],
                'contact_no' => $_POST['contact_no'],
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            if ($this->model->register($data)) {
                header('Location: /index.php');
            }
        }
        require 'views/auth/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->model->login($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user['id'];
                header('Location: /index.php?controller=admin&action=dashboard');
            } else {
                echo "<script>alert('Invalid username or password');</script>";
            }
        }
        require 'views/auth/login.php';
    }
}