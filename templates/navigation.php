<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-20
 * Time: 22:07
 */



//var_dump($EIM);



/*
$menuPuslapiai = array(
    "Pradžia"   => "pradzia",
    "Projektai" => "projektai",
    "Klientai"  =>  "klientai",
    "Vartotojas" => "vartotojas",
    "Prisijungimas" => "prisijungti",
    "Atsijungimas" => "atsijungti"
);

if($EIV->arPrisijunges()) {
    foreach ($menuPuslapiai as $key => $value) {
        echo "<li><a href=\"" . $value . "\"" .
            (($dabartinisPuslapis === $value) ? " class=\"current-page\"" : "")
            . ">" . $key . "</a></li>";
    }
}
*/
/*
foreach ($menuPuslapiai as $key => $value) {
    if($value->jauRodytas) continue;
    if($value->matoPrisijunges != 0) {
        if($EIV->arPrisijunges()) {
            echo "<li><a href=\"" . $value->puslapioAdresas . "\"" .
                (($dabartinisPuslapis === $value->puslapioAdresas) ? " class=\"current-page\"" : "")
                . ">" . $value->puslapioPavadinimas . "</a></li>";
            $value->jauRodytas = true;
            continue;
        }
    }
    if($value->matoAtsijunges != 0) {
        if(!$EIV->arPrisijunges()) {
            echo "<li><a href=\"" . $value->puslapioAdresas . "\"" .
                (($dabartinisPuslapis === $value->puslapioAdresas) ? " class=\"current-page\"" : "")
                . ">" . $value->puslapioPavadinimas . "</a></li>";
            $value->jauRodytas = true;
            continue;
        }
    }

    if( ... )
    {
        // Kiti leidimai
    }
}
*/

?>