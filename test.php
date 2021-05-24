<?php

use \CenturyDb\CenturiesSearch as Db;

// Déclaration du fichier racine
define('ROOTDIRS', './');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

$db = new Db('articles', 1);

dump($db->findFieldInDb('categorie', 'episodes'));

?>
