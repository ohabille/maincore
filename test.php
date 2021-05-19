<?php

use \CenturyDb\Db as Db;

// Déclaration du fichier racine
define('ROOTDIRS', './');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

$Db = new Db('articles');

$Db->setNextCentury();
dump($Db->getTotal());

$hexa = dechex("20");
dump($hexa);
$dec = hexdec("1aa");
dump($dec);

?>
