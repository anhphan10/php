<?php
require_once 'Models/DBAccess.php';
class MainController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'home';
        $controller = isset($_GET['controller']) ? $_GET['controller'] : '';

        switch($controller) {
            case 'customer':
                require_once 'Controllers/CustomerController.php';
                $customerController = new CustomerController();
                // Validate controller và action name để tránh XSS tấn công XSS (Cross-Site Scripting) /[^a-zA-Z]/ là một biểu thức chính quy (regular expression), trong đó: ^ có nghĩa là "không phải". thay thế bằng chuỗi rỗng ('').
                // $controller = preg_replace('/[^a-zA-Z]/', '', $controller);
                // $action = preg_replace('/[^a-zA-Z]/', '', $action);
                
                switch($action) {
                    case 'list':
                        $customerController->index();
                        break;
                    case 'add':
                        $customerController->add();
                        break;
                    case 'edit':
                        $customerController->edit();
                        break;
                    case 'delete':
                        $customerController->delete();
                        break;
                    default:
                        $customerController->index();
                }
                break;
            case 'product': 
                require_once 'Controllers/ProductController.php';
                $productController = new ProductController();
                switch($action) {
                    case 'list':
                        $productController->index();
                        break;
                    case 'add':
                        $productController->add();
                        break;
                    case 'edit':
                        $productController->edit();
                        break;
                    case 'delete':
                        $productController->delete();
                        break;
                    default:
                        $productController->index();
                }
                break;
            case 'productcompany': 
                require_once 'Controllers/ProductCompanyController.php';
                $productCompanyController = new ProductCompanyController();
                switch($action) {
                    case 'list':
                        $productCompanyController->index();
                        break;
                    case 'add':
                        $productCompanyController->add();
                        break;
                    case 'edit':
                        $productCompanyController->edit();
                        break;
                    case 'delete':
                        $productCompanyController->delete();
                        break;
                    default:
                        $productCompanyController->index();
                }
                break;
            case 'producttype': 
                require_once 'Controllers/ProductTypeController.php';
                $productTypeController = new ProductTypeController();
                switch($action) {
                    case 'list':
                        $productTypeController->index();
                        break;
                    case 'add':
                        $productTypeController->add();
                        break;
                    case 'edit':
                        $productTypeController->edit();
                        break;
                    case 'delete':
                        $productTypeController->delete();
                        break;
                    default:
                        $productTypeController->index();
                }
                break;
            default:
                include 'Views/home.php';
        }
    }
}