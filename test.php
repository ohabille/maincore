<?php

use \CenturyDb\CenturiesSelect as SelectDb;
use \CenturyDb\CenturiesSearch as SearchDb;

// Déclaration du fichier racine
define('ROOTDIRS', './');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

$dbSelect = new SelectDb('articles', 5);

foreach ($dbSelect->getSelect() as $k=>$val) {
    $date = date('d/m/Y - H:i:s', (int) $val['time']);
    dump($date);
}

$dbSearch = new SearchDb('articles');
dump($dbSearch->findFieldInDb('categorie', 'episodes'));

?>
