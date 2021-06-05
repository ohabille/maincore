<?php

use \CenturyDb\CenturiesSelect as SelectDb,
    \CenturyDb\CenturiesSearch as SearchDb;

// chargement du fichier d'initialisation
require_once 'spinalCord.php';

$dbSelect = new SelectDb('articles', 5);

foreach ($dbSelect->getSelect() as $k=>$val) {
    $date = date('d/m/Y - H:i:s', (int) $val['time']);
    dump($date);
}

$dbSearch = new SearchDb('articles', 1);

$filters = [
    'categorie'=>'episodes'
];

dump($dbSearch->findFieldInDb($filters)[0]['title']);
?>
