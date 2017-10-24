<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-24
 * Time: 23:13
 */

if(!defined("EI")) { header("Location: ../"); exit(); }

if(!$EIV->arPrisijunges()) { $EIV->eiti("Location: ../"); }

/* jei Turi teise redaguotiTeises */


$grupes = array();

$sql = $PDO->prepare("SELECT ID, group_name FROM ei_groups");
$sql->execute();

while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    //$grupes[] = $row["ID"];
    $grupe = (new grupe($PDO))->grupesTeises($row["ID"], $PDO);

    echo "[" . $row["ID"] . "] " . $row["group_name"] . "Teisės: <br/>";
    //print_r($grupesTeises);
    //print_r($grupe->teises);
    echo "<ul>";
    foreach (array_keys($grupe->teises) as $i) {
        echo "<li>" . $i . "</li>";
    }
    echo "</ul><br/><br/>";
}

//var_dump($grupes);

?>