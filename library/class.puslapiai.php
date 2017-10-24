<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-22
 * Time: 14:18
 */

class puslapiai
{
    private $rodomasPuslapis;
    private $rodomoPuslapioAdresas;

    private $puslapioKintamieji = array();

    function __construct($puslapis)
    {
        $this->rodomasPuslapis = $puslapis;
        $this->rodomoPuslapioAdresas = PAGES_PATH . "/" . $puslapis . ".php";
    }

    public function gautiPuslapi()
    {
        return $this->rodomasPuslapis;
    }

    public function gautiPuslapioAdresa()
    {
        return $this->rodomoPuslapioAdresas;
    }

    public function arPuslapisYra($puslapis)
    {
        return file_exists(PAGES_PATH . "/" . $puslapis . ".php");
    }

    public function arPuslapisTuriJS()
    {
        if(file_exists(PAGES_JS_PATH . "/" . $this->rodomasPuslapis . ".js"))
        {
            return PAGES_JS_PATH . "/" . $this->rodomasPuslapis . ".js";
        }
        return null;
    }

    public function dabartinisPuslapis()
    {
        return (!empty($_GET["p"]) ? htmlspecialchars($_GET["p"]) : null);
    }

    function rodytiPuslapi()
    {
        if(count($this->puslapioKintamieji) > 0) {
            foreach ($this->puslapioKintamieji as $key => $value) {
                if (strlen($key) > 0) {
                    ${$key} = $value;
                }
            }
        }

        require_once(TEMPLATES_PATH . "/header.php");

        echo "<div id=\"container\">\n"
            . "\t<div id=\"content\">\n";

        require_once($this->rodomoPuslapioAdresas);

        echo "\t</div>\n";
        echo "</div>\n";

        require_once(TEMPLATES_PATH . "/footer.php");
    }

    public function pakeistiPuslapi($puslapis)
    {
        $this->rodomasPuslapis = $puslapis;
        $this->rodomoPuslapioAdresas = PAGES_PATH . "/" . $puslapis . ".php";
    }

    public function pakeistiKintamuosius($kintamieji = array())
    {
        $this->puslapioKintamieji = $kintamieji;
    }
}