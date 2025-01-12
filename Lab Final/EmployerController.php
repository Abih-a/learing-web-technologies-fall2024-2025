<?php
require_once 'models/Employer.php';

class EmployerController {
    private $model;

    public function __construct($db) {
        $this->model = new Employer($db);
    }

    public function registerEmployer($data) {
        if (!empty($data['employer_name']) && !empty($data['company_name']) && !empty($data['contact_no']) && !empty($data['username']) && !empty($data['password'])) {
            return $this->model->register($data['employer_name'], $data['company_name'], $data['contact_no'], $data['username'], $data['password']);
        }
        return false;
    }

    public function updateEmployer($data) {
        return $this->model->update($data['id'], $data['company_name'], $data['contact_no']);
    }

    public function deleteEmployer($id) {
        return $this->model->delete($id);
    }

    public function searchEmployer($search) {
        return $this->model->search($search);
    }
}
?>