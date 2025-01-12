<?php
require_once 'config/database.php';

class EmployerModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register($data) {
        $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password) VALUES (:employer_name, :company_name, :contact_no, :username, :password)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function login($username) {
        $sql = "SELECT * FROM employers WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $sql = "SELECT * FROM employers";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM employers WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE employers SET employer_name = :employer_name, company_name = :company_name, contact_no = :contact_no WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM employers WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function search($query) {
        $sql = "SELECT * FROM employers WHERE employer_name LIKE :query";
        $stmt = $this->conn->prepare($sql);
        $search = "%$query%";
        $stmt->bindParam(':query', $search);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
