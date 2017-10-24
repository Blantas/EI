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

    public function __construct($adresas, $pavadinimas, $matoPrisijunges, $matoAtsijunges)
    {
        $this->data["puslapioAdresas"] = $adresas;
        $this->data["puslapioPavadinimas"] = $pavadinimas;
        $this->data["matoPrisijunges"] = $matoPrisijunges;
        $this->data["matoAtsijunges"] = $matoAtsijunges;
        $this->data["jauRodytas"] = false;

        // TODO: pridėti puslapioNuorodosTekstas (tekstas, rašomos navigacijoje)

        // TODO: pridėti nuorodosTipas (0 - vidinis svetainės puslapis, ../puslapis ; 1 - išorinis, www.google.lt)

        // TODO: pridėti naujameLange (0 - ne; 1 - pvz, target="_blank")

        // TODO: pridėti puslapio leidimus
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