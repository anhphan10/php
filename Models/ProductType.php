<?php
class ProductType {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAllProductsType() {
        $query = "SELECT loaisp.*, hangsp.TenHangSP 
                 FROM loaisp 
                 LEFT JOIN hangsp ON loaisp.MaHangSP = hangsp.MaHangSP";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllProductCompany() {
        $query = "SELECT * FROM hangsp";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function addProductType($TenLoaiSP, $MoTaLoai, $MaHangSP) {
        $query = "INSERT INTO loaisp (TenLoaiSP, MoTaLoai, MaHangSP) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $TenLoaiSP, $MoTaLoai, $MaHangSP);
        return $stmt->execute();
    }
    public function getProductTypeById($id) {
        $query = "SELECT * FROM loaiSP WHERE MaLoaiSP = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateProductType($id, $TenLoaiSP, $MoTaLoai) {
        $query = "UPDATE loaiSp SET TenLoaiSP = ?, MoTaLoai = ? WHERE MaLoaiSP = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->error;
            return false;
        }
        $stmt->bind_param("ssi", $TenLoaiSP, $MoTaLoai, $id);
        $result = $stmt->execute();
        if ($result === false) {
            echo "Lỗi khi thực thi câu lệnh: " . $stmt->error;
        }
        return $result;
    }

    public function deleteProductType($id) {
        $query = "DELETE FROM loaiSP WHERE MaLoaiSP = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}