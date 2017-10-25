<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-23
 * Time: 23:23
 */

class puslapioTipas
{
    private $data = array();

    public function __construct($adresas, $pavadinimas, $matoPrisijunges, $matoAtsijunges, $nuorodosTekstas, $rodymoMeniu,
                                $tevinisPuslapis, $rodymoEile, $nuorodosTipas, $naujameLange, $reikiaTeisiu)
    {
        $this->data["puslapioAdresas"] = $adresas;
        $this->data["puslapioPavadinimas"] = $pavadinimas;
        $this->data["matoPrisijunges"] = $matoPrisijunges;
        $this->data["matoAtsijunges"] = $matoAtsijunges;
        $this->data["jauRodytas"] = false;
        $this->data["nuorodosTekstas"] = $nuorodosTekstas;
        $this->data["rodymoMeniu"] = $rodymoMeniu;
        $this->data["tevinisPuslapis"] = $tevinisPuslapis;
        $this->data["rodymoEile"] = $rodymoEile;
        $this->data["nuorodosTipas"] = $nuorodosTipas;
        $this->data["naujameLange"] = $naujameLange;
        $this->data["reikiaTeisiu"] = $reikiaTeisiu;
    }

    public function __get($key)
    {
        if(array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        return false;
    }

    public function __set($key, $value)
    {
        if(array_key_exists($key, $this->data)) {
            $this->data[$key] = $value;
        }
    }
}