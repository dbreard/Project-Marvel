<?php
    // phpinfo();
    //faire une admin du site marvel
    require "config.php";
    $view = "view/no-connect/login.php";

    if($_GET){
        if(isset($_GET["page"])){
            foreach(PAGE_SITE as $key => $val){
                if($key == $_GET["page"]){
                    $view = $val;
                    break;
                }
            }
            // $view = "view/no-connect/".$_GET["page"].".php";
        }
    }
    if($_POST){
        
        require "controller/LoginController.php";
        $controllerLogin = new LoginController();
        $view = $controllerLogin->login($_POST);
        
    }
    require $view;

    // $isEmail = $controllerLogin -> validateEmail("zoubida@dd.fr");
    // var_dump($isEmail); 

    ?>

    

