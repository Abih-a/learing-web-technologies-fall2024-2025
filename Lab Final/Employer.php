<?php
class Employer {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($employer_name, $company_name, $contact_no, $username, $password) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $employer_name, $company_name, $contact_no, $username, $password_hash);
        return $stmt->execute();
    }

    public function update($id, $company_name, $contact_no) {
        $sql = "UPDATE employers SET company_name=?, contact_no=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $company_name, $contact_no, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM employers WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function search($search) {
        $sql = "SELECT * FROM employers WHERE employer_name LIKE ? OR company_name LIKE ?";
        $search_term = "%$search%";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $search_term, $search_term);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
