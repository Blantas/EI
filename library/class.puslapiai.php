<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-25
 * Time: 22:24
 */

class puslapiai
{
    private $data = array();

    function prideti($pavadinimasAntraste, $pavadinimasNuoroda, $tipas, $adresas, $meniu, $eile, $tevinis,
                                $naujameLange, $prisijunges, $atsijunges, $teises)
    {
        $this->data[$adresas] = new puslapioTipas($adresas, $pavadinimasAntraste, $prisijunges, $atsijunges, $pavadinimasNuoroda, $meniu,
            $tevinis, $eile, $tipas, $naujameLange, $teises);
    }

    public function __get($key)
    {
        if(array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        return false;
    }
}