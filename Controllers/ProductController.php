<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->productModel = new Product($db);
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        require 'Views/Product/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->productModel->addProduct($_POST['TenSP'], $_POST['Hang'], $_POST['Loai'], $_POST['DonGia'], $_POST['SoLuong'], $_POST['MoTaSP'],  $_POST['HinhAnhSP']);

            if ($result) {
                header("Location: index.php?controller=product&action=list");
            } else {
                echo "Có lỗi xảy ra khi thêm sản phẩm";
            }
        } else {
            require 'Views/Product/add.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaSP'];
            $result = $this->productModel->updateProduct($id, $_POST['TenSP'], $_POST['Hang'], $_POST['Loai'], $_POST['DonGia'], $_POST['SoLuong'],  $_POST['MoTaSP'], $_POST['HinhAnhSP']);

            if ($result) {
                header("Location: index.php?controller=product&action=list");
            } else {
                echo "Có lỗi xảy ra khi cập nhật sản phẩm";
            }
        } else {
            $id = $_GET['id'];
            $product = $this->productModel->getProductById($id);
            if ($product) {
                require 'Views/Product/edit.php';
            } else {
                echo "Không tìm thấy sản phẩm";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->productModel->deleteProduct($id);
            if ($result) {
                header("Location: index.php?controller=product&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa sản phẩm";
            }
        }
    }
}