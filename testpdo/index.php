<?php 
include 'configuration.php';
include 'class/db.php';
include 'class/clients.php';
$client = new clients();
var_dump($client->getClientsList());
?>