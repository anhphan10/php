<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM sanpham";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function addProduct($TenSP, $Hang, $Loai, $DonGia, $SoLuong, $MoTaSP, $HinhAnhSP) {
        $query = "INSERT INTO sanpham (TenSP, Hang, Loai, DonGia, SoLuong, MoTaSP, HinhAnhSP) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssdiss", $TenSP, $Hang, $Loai, $DonGia, $SoLuong, $MoTaSP, $HinhAnhSP);
        return $stmt->execute();
    }
    public function getProductById($id) {
        $query = "SELECT * FROM sanpham WHERE MaSP = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function updateProduct($id, $TenSP, $Hang, $Loai, $DonGia, $SoLuong, $MoTaSP, $HinhAnhSP) {
        $query = "UPDATE sanpham SET TenSP = ?, Hang = ?, Loai = ?, DonGia = ?, SoLuong = ?, MoTaSP = ?, HinhAnhSP = ? WHERE MaSP = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->error;
            return false;
        }
        $stmt->bind_param("sssdissi", $TenSP, $Hang, $Loai, $DonGia, $SoLuong, $MoTaSP, $HinhAnhSP, $id);
        $result = $stmt->execute();
        if ($result === false) {
            echo "Lỗi khi thực thi câu lệnh: " . $stmt->error;
        }
        return $result;
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM sanpham WHERE MaSP = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}