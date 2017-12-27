<?php
//creation de 3 constantes
//url, asset, array des pages

    define("HOSTURL", "http://localhost/Mike/mvc/");

    // const HOSTURLASSET = HOSTURL."asset/";

    define("HOSTURLASSET", HOSTURL."asset/");

    const PAGE_SITE = array(
        "login" => "view/no-connect/login.php",
        "register" => "view/no-connect/register.php",
        "index" => "view/connect/index.php",
    );

?>