<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Customer.php';

class CustomerController {
    private $customerModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->customerModel = new Customer($db);
    }

    public function index() {
        $customers = $this->customerModel->getAllCustomers();
        require 'Views/Customer/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->customerModel->addCustomer($_POST['TenKH'], $_POST['GioiTinh'], $_POST['DiaChi'], $_POST['SDT'], $_POST['Email']);
            if ($result) {
                header("Location: index.php?controller=customer&action=list");
            } else {
                echo "Có lỗi xảy ra khi thêm khách hàng";
            }
        } else {
            require 'Views/Customer/add.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaKH'];
            $result = $this->customerModel->updateCustomer($id, $_POST['TenKH'], $_POST['GioiTinh'], $_POST['DiaChi'], $_POST['SDT'], $_POST['Email']);
            if ($result) {
                header("Location: index.php?controller=customer&action=list");
            } else {
                echo "Có lỗi xảy ra khi cập nhật khách hàng";
            }
        } else {
            $id = $_GET['id'];
            $customer = $this->customerModel->getCustomerById($id);
            if ($customer) {
                require 'Views/Customer/edit.php';
            } else {
                echo "Không tìm thấy khách hàng";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->customerModel->deleteCustomer($id);
            if ($result) {
                header("Location: index.php?controller=customer&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa khách hàng";
            }
        }
    }
}