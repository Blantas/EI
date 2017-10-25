<?php

require_once("_config.php");

$psl = $EIP->dabartinisPuslapis(); // Grąžina aktyvų puslapį iš ?p=PUSLAPIS

if($psl != null) // Ar aktyvus puslapis nurodytas
{
    /*
     * Perdaryti su $EIM
     */

    if($EIP->arPuslapisYra($psl)) $EIP->pakeistiPuslapi($psl); // Jei toks puslapis yra, nurodome, jog jį ir užkrautų, o ne pradinį
    else // ...jei puslapio nėra rodomas klaidos puslapis
    {
        header("Location: klaida");
        //$ei->pakeistiPuslapi('klaida');
    }
}
else $psl = $EIP->gautiPuslapi(); // Aktyvus puslapis nenurodytas, todėl nusirodome, jog tai pradžios puslapis
if(!$EIV->arPrisijunges() && $psl != "prisijungti") header("Location: prisijungti"); //

$perduotiInfo = array( // Kintamieji, kurie bus pasiekiami vidiniuose puslapiuose
    'PDO'                   => $PDO, // Mysql serverio ryšys
    'dabartinisPuslapis'    => $psl, // Aktyvaus puslapio pavadinimas (naudojama tikrinti, kuris psl navigacijoje aktyvus)
    'puslapioJS'            => $EIP->arPuslapisTuriJS(), // Ar puslapis turi atskirą JS failą
    'kazkas'                => 'Sveiki, čia pradžia',
    'EIV'                   => $EIV, // Vartotojo OBJ
    'EIM'                   => $EIM  // Svetainės puslapių OBJ
);

$EIP->pakeistiKintamuosius($perduotiInfo); // Kintamieji, kurie bus pasiekiami vidiniuose puslapiuose
$EIP->rodytiPuslapi();


/*
if($vartotojas->sukurti("Karolis","Vaikutis",null,null,1,"admin","email@test.lt","123456"))
{
    echo "Sukurta!";
}
else echo $vartotojas->klaidos();
*/

?>