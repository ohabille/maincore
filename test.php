<?php

use \CenturyDb\CenturiesSelect as Db;

// Déclaration du fichier racine
define('ROOTDIRS', './');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

$Db = new Db('articles');

dump($Db->getTotal());

?>
