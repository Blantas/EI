<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-24
 * Time: 22:40
 */

class grupe
{
    public $teises;

    private $db;

    public function __construct($PDO) {
        $this->db = $PDO;
    }
/*
    public function grupesTeises($grupesID, $PDO) {
        $grupesTeises = new grupe($PDO);
        $sql = "SELECT t2.permission_name FROM ei_group_permissions as t1
                JOIN ei_permissions as t2 ON t1.permission_ID = t2.ID
                WHERE t1.group_ID = :grupes_id";
        $sql = $PDO->prepare($sql);
        $sql->execute(array(":grupes_id" => $grupesID));

        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $grupesTeises->teises[$row["permission_name"]] = true;
        }
        return $grupesTeises;
    }
*/
    public function grupesTeises($grupesID) {
        $this->teises = array();

        $sql = "SELECT t2.permission_name FROM ei_group_permissions as t1
                JOIN ei_permissions as t2 ON t1.permission_ID = t2.ID
                WHERE t1.group_ID = :grupes_id";
        $sql = $this->db->prepare($sql);
        $sql->execute(array(":grupes_id" => $grupesID));

        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->teises[$row["permission_name"]] = true;
        }
        return $this->teises;
    }

    public function arTuriTeise($teisesID) {
        return isset($this->teises[$teisesID]);
    }
}