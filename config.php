<?php
//creation de 3 constantes
//url, asset, array des pages

    define("HOSTURL", "http://localhost/Mike/mvc/");

    // const HOSTURLASSET = HOSTURL."asset/";


    // définition des constantes de connexion à la bdd
    define("HOSTURLASSET", HOSTURL."asset/");
    define("BDDHOST", "localhost");
    define("BDDUSER", "root");
    define("BDDPASS", "");
    define("BDDDATABASE", "marvelbdd");
    

    const PAGE_SITE = array(
        "login" => "view/no-connect/login.php",
        "register" => "view/no-connect/register.php",
        "index" => "view/connect/index.php",
    );

?>