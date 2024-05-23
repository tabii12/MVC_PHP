<?php 
    require_once 'app/controllers/HomeController.php';

    require_once 'app/models/Database.php';
    require_once 'app/models/ProductModel.php';
    require_once 'app/models/ListModel.php';
    $home = new HomeController();
    $home->headerPage();

    require_once 'app/views/header.php';
   
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){
            case '':
                break;

            default:
                $home->homePage();
        }
    }else{
        $home->homePage();
    }
    require_once 'app/views/footer.php';