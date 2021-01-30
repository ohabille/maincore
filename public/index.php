<?php


// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

$servicesConf = parseConf('devs/injection');

$route = new \GrendelRequests\MatchUri();

dump($route->getRoute());

?>
