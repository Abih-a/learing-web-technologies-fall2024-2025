<?php
require_once 'models/EmployerModel.php';

class AdminController {
    private $model;

    public function __construct() {
        $this->model = new EmployerModel();
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /index.php');
            exit;
        }
        $employers = $this->model->getAll();
        require 'views/admin/dashboard.php';
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->model->delete($_GET['id']);
        }
        header('Location: /index.php?controller=admin&action=dashboard');
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_POST['id'],
                'employer_name' => $_POST['employer_name'],
                'company_name' => $_POST['company_name'],
                'contact_no' => $_POST['contact_no']
            ];
            $this->model->update($data);
        }
        header('Location: /index.php?controller=admin&action=dashboard');
    }

    public function search() {
        if (isset($_GET['query'])) {
            $results = $this->model->search($_GET['query']);
            require 'views/admin/search.php';
        }
    }
}