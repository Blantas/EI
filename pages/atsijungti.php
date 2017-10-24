<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-23
 * Time: 23:16
 */

if(!defined("EI")) { header("Location: ../"); exit(); }

if(!$EIV->arPrisijunges()) { $EIV->eiti("Location: ../"); }

$EIV->atsijungti();
$EIV->eiti("prisijungti");

?>