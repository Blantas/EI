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





//var_dump($EIV->a());

echo "Tikrinama ar turi teisę <b>redaguotiGrupes</b>: ";
if($EIV->arTuriTeise("redaguotiGrupes"))  echo "YRA";
else echo "NĖRA";








if($EIV->arTuriTeise("redaguotiGrupes")) {
    echo "<br/><br/>";
    $grupes = array();
    $sql = $PDO->prepare("SELECT ID, group_name FROM ei_groups");
    $sql->execute();
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        //$grupe = (new grupe($PDO))->grupesTeises($row["ID"], $PDO);
        $grupe = (new grupe($PDO))->grupesTeises($row["ID"]);

        echo "[" . $row["ID"] . "] " . $row["group_name"] . "Teisės: <br/>";
        echo "<ul>";
        foreach (array_keys($grupe) as $i) {
            echo "<li>" . $i . "</li>";
        }
        echo "</ul><br/><br/>";
    }
}

?>