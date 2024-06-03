<?php 
    require_once './controllers/HomeController.php';

    require_once './models/Database.php';
    require_once './models/ProductModel.php';
    require_once './models/CategoryModel.php';
    require_once './models/UserModel.php';
    $home = new HomeController();

    require_once './views/header.php';
   
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){
            case 'detail':
                $home->detail();
                break;

            case 'category':
                $home->category();
                break;

            case 'login':
                $home->login();
                break;
            default:
                $home->homePage();
        }
    }else{
        $home->homePage();
    }
    require_once './views/footer.php';