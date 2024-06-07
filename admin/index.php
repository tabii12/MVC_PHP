<?php
    require_once './controllers/AdminController.php';

    require_once './models/Database.php';
    require_once './models/CategoryModel.php';
    require_once './models/ProductModel.php';
    require_once './models/UserModel.php';

    $admin = new AdminController();

    require_once './views/header.php';

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page){
            case 'add_product': 
                $admin->addProduct();
                break;
            case 'user':
                $admin->user();
                break;
            case 'del':
                $admin->del();
                break;
            case 'edit':
                $admin->edit();
                $admin->editPro();
                break;
            default:
                $admin->product();
                $admin->category();
        }
    }else{
        $admin->product();
        $admin->category();
    }