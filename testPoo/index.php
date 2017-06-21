<?php
include_once 'class/vehicule.php';
include_once 'class/moto.php';
$vehicule = new moto();
$vehicule->color = 'rouge';


$vehicule2 =new moto();
$vehicule2->color='noir';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>title</title>
    </head>
    <body>
        <h1>voiture</h1>
        <p><?=$vehicule->start() ?></p>
        <p><?=$vehicule->stop() ?></p>
        <p><?=$vehicule->checkFioul() ?></p>
        <h2>motos</h2>
        <p><?=$vehicule2->start() ?></p>
        <p><?=$vehicule2->stop() ?></p>
        <p><?=$vehicule2->checkFioul() ?></p>
    </body>
</html>
