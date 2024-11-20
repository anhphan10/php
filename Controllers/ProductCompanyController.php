<?php
require_once 'Models/DBAccess.php';
require_once 'Models/ProductCompany.php';
class ProductCompanyController {
    private $productCompanyModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->productCompanyModel = new ProductCompany($db);
    }

    public function index() {
        $productscompany = $this->productCompanyModel->getAllProductsCompany();
        require 'Views/ProductCompany/list.php';
    }
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->productCompanyModel->addProductCompany($_POST['TenHangSP'], $_POST['MoTaHang']);

            if ($result) {
                header("Location: index.php?controller=productcompany&action=list");
            } else {
                echo "Có lỗi xảy ra khi thêm hãng sản phẩm";
            }
        } else {
            require 'Views/ProductCompany/add.php';
        }
    }
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaHangSP'];
            $result = $this->productCompanyModel->updateProductCompany($id, $_POST['TenHangSP'], $_POST['MoTaHang']);

            if ($result) {
                header("Location: index.php?controller=productcompany&action=list");
            } else {
                echo "Có lỗi xảy ra khi cập nhật hãng sản phẩm";
            }
        } else {
            $id = $_GET['id'];
            $product = $this->productCompanyModel->getProductCompanyById($id);
            if ($product) {
                require 'Views/ProductCompany/edit.php';
            } else {
                echo "Không tìm thấy hãngsản phẩm";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->productCompanyModel->deleteProductCompany($id);
            if ($result) {
                header("Location: index.php?controller=productcompany&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa hãng sản phẩm";
            }
        }
    }
}