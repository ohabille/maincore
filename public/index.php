<?php


// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

$servicesConf = parseConf('devs/injection');

$routes = new \MainLib\Request(
    new \MainLib\MatchRequests(
        new \MainLib\Routes
    )
);

dump($routes->getRequest());

?>
