<?php


// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

$servicesConf = parseConf('devs/injection');
dd($servicesConf);

$routes = new \MainLib\Routes(getConf('routes'));

dump($routes->getRequests());

?>
