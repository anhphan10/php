<?php
require_once 'Models/DBAccess.php';
require_once 'Models/ProductType.php';
class ProductTypeController {
    private $productTypeModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->productTypeModel = new ProductType($db);
    }

    public function index() {
        $productstype = $this->productTypeModel->getAllProductsType();
        require 'Views/ProductType/list.php';
    }
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->productTypeModel->addProductType(
                $_POST['TenLoaiSP'], 
                $_POST['MoTaLoai'],
                $_POST['MaHangSP']
            );

            if ($result) {
                header("Location: index.php?controller=producttype&action=list");
            } else {
                echo "Có lỗi xảy ra khi thêm loại sản phẩm";
            }
        } else {
            $companies = $this->productTypeModel->getAllProductCompany();
            require 'Views/ProductType/add.php';
        }
    }
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaLoaiSP'];
            $result = $this->productTypeModel->updateProductType($id, $_POST['TenLoaiP'], $_POST['MoTaLoai']);

            if ($result) {
                header("Location: index.php?controller=producttype&action=list");
            } else {
                echo "Có lỗi xảy ra khi cập nhật loai sản phẩm";
            }
        } else {
            $id = $_GET['id'];
            $product = $this->productTypeModel->getProductTypeById($id);
            if ($product) {
                require 'Views/ProductType/edit.php';
            } else {
                echo "Không tìm thấy loại sản phẩm";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->productTypeModel->deleteProductType($id);
            if ($result) {
                header("Location: index.php?controller=producttype&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa loại sản phẩm";
            }
        }
    }
}