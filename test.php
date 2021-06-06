<?php

use \CenturyDb\CenturiesSelect as SelectDb,
    \CenturyDb\CenturiesSearch as SearchDb;

// chargement du fichier d'initialisation
require_once 'spinalCord.php';

$dbSelect = SelectDb::connectToDb('articles')->byStep(5);

foreach ($dbSelect->getSelect() as $k=>$val) {
    $date = date('d/m/Y - H:i:s', (int) $val['time']);
    dump($date);
}

$filters = [
    'categorie'=>'episodes'
];

$dbSearch = SearchDb::connectToDb('articles')
    ->withFilters($filters)
    ->getSelect();

dump($dbSearch[0]['title']);

?>
