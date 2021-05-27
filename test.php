<?php

// use \CenturyDb\CenturiesSearch as Db;
use \CenturyDb\CenturiesSelect as Db;

// Déclaration du fichier racine
define('ROOTDIRS', './');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

// $db = new Db('articles');
$db = new Db('articles', 5);

// dump($db->findFieldInDb('categorie', 'episodes'));
dump($db->getSelect(1));

?>
