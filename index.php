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
        
        if(isset($_POST["page"])){
            switch($_POST["page"]): //correspond {
                
                case "login": 
                    require "controler/LoginControler.php";
                    $controllerLogin = new LoginControler();
                    $view = $controllerLogin->login($_POST);
                    break;

                case "register": 
                    require "controler/LoginControler.php";
                    $controllerLogin = new LoginControler();
                    $view = $controllerLogin->login($_POST);
                    break;

            endswitch; //correspond }    
        }
               
    }
    require $view;

    // $isEmail = $controllerLogin -> validateEmail("zoubida@dd.fr");
    // var_dump($isEmail); 

    ?>

    

