<?php
class Customer {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    } 

    public function getAllCustomers() {
        $query = "SELECT * FROM khachhang";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addCustomer($TenKH, $GioiTinh, $DiaChi, $SDT, $Email) {
        $query = "INSERT INTO khachhang (TenKH, GioiTinh, DiaChi, SDT, Email) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $TenKH, $GioiTinh, $DiaChi, $SDT, $Email);
        return $stmt->execute();
    }
    public function getCustomerById($id) {
        $query = "SELECT * FROM khachhang WHERE MaKH = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateCustomer($id, $TenKH, $GioiTinh, $DiaChi, $SDT, $Email) {
        $query = "UPDATE khachhang SET TenKH = ?, GioiTinh = ?, DiaChi = ?, SDT = ?, Email = ? WHERE MaKH = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->error;
            return false;
        }
        $stmt->bind_param("sssssi", $TenKH, $GioiTinh, $DiaChi, $SDT, $Email, $id);
        $result = $stmt->execute();
        if ($result === false) {
            echo "Lỗi khi thực thi câu lệnh: " . $stmt->error;
        }
        return $result;
    }

    public function deleteCustomer($id) {
        $query = "DELETE FROM khachhang WHERE MaKH = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}