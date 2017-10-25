<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
 
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><?php

    //echo "<title>E-Įvaizdis - " . $menuPuslapiai[$dabartinisPuslapis]->puslapioPavadinimas . "</title>";

    ?>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <script><?php if($puslapioJS != null) include($puslapioJS); ?></script>
</head>
 
<body class = "<?php echo $dabartinisPuslapis; ?>">
    <div id="header-wrapper">
        <div id="header">
            <div id="menu">
                <ul>
                    <?php
                        include(TEMPLATES_PATH . "/navigation.php");
                    ?>
                </ul>
            </div>
        </div>
    </div>