<?php
class ProductCompany {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllProductsCompany() {
        $query = "SELECT * FROM hangsp";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function addProductCompany($TenHangSP, $MoTaHang) {
        $query = "INSERT INTO hangsp (TenHangSP, MoTaHang) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $TenHangSP, $MoTaHang);
        return $stmt->execute();
    }

    public function getProductCompanyById($id) {
        $query = "SELECT * FROM hangSP WHERE MaHangSP = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function updateProductCompany($id, $TenHangSP, $MoTaHang) {
        $query = "UPDATE hangSP SET TenHangSP = ?, MoTaHang = ? WHERE MaHangSP = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->error;
            return false;
        }
        $stmt->bind_param("ssi", $TenHangSP, $MoTaHang, $id);
        $result = $stmt->execute();
        if ($result === false) {
            echo "Lỗi khi thực thi câu lệnh: " . $stmt->error;
        }
        return $result;
    }

    public function deleteProductCompany($id) {
        $query = "DELETE FROM hangSP WHERE MaHangSP = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}