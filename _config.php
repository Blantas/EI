<?php

session_start();

define("EI", "1");

/*
 *	Pagrindiniai nustatymai
 */

$config = array(
    "db" => array(
        "database01" => array(
            "dbname" 	=> "ei_sistema",
            "username" 	=> "root",
            "password" 	=> "",
            "host" 		=> "localhost",
            "charset"   => "utf8"
        ),
        "database02" => array(
            "dbname" 	=> "",
            "username" 	=> "",
            "password" 	=> "",
            "host" 		=> "",
            "charset"   => "utf8"
        )
    ),
    "urls" => array(
        "baseUrl" 	=> "localhost/ei"
    ),
    "paths" => array(
        "styles" => "/styles",
        "images" 	=> "/images/"
    )
);
 

/*
 *  Include'inimui, pavyzdžiui:
 *  		require_once(LIBRARY_PATH . "byla.php")
 */

defined("USE_DATABASE")
    or define("USE_DATABASE", "database01");

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
     
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

defined("PAGES_PATH")
or define("PAGES_PATH", realpath(dirname(__FILE__) . '/pages'));

defined("PAGES_JS_PATH")
    or define("PAGES_JS_PATH", realpath(dirname(__FILE__) . '/pages/js'));
 
/*
 * Klaidoms
 */

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

/*
 * PDO
 */

$DSN = "mysql:host=".$config["db"][USE_DATABASE]["host"].";dbname=".$config["db"][USE_DATABASE]["dbname"].";charset=".$config["db"][USE_DATABASE]["charset"];
$OPT = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

global $PDO;

try {
    $PDO = new PDO($DSN, $config["db"][USE_DATABASE]["username"], $config["db"][USE_DATABASE]["password"], $OPT);
}

catch(PDOException $ex) {
    // echo $ex->getMessage();
    die("Prisijungti prie duomenų bazės nepavyko!");
}

require_once LIBRARY_PATH . "/class.puslapis.php";
require_once LIBRARY_PATH . "/class.puslapioTipas.php";
require_once LIBRARY_PATH . "/class.puslapiai.php";
require_once LIBRARY_PATH . "/class.vartotojas.php";
require_once LIBRARY_PATH . "/class.grupe.php";



$EIV = new vartotojas($PDO);
$EIP = new puslapis("pradzia");
$EIM = new puslapiai();

$EIM->prideti("Pradžia","Pradžia",1,"pradzia",1, 1,null,false,true,false,null);
$EIM->prideti("Narių grupės","Grupės",1,"grupes",1, 1,null,false,true,false,null);
$EIM->prideti("Projektai","Projektai",1,"projektai",1, 1,null,false,true,false,null);
$EIM->prideti("Klientai","Klientai",1,"klientai",1, 1,null,false,true,false,null);
$EIM->prideti("Vartotojas","Vartotojas",1,"vartotojas",1, 1,null,false,true,false,null);
$EIM->prideti("Narių grupes","Grupės",1,"grupes",1, 1,null,false,true,false,null);
$EIM->prideti("Atsijungimas","Atsijungti",1,"atsijungimas",1, 1,null,false,true,false,null);


?>