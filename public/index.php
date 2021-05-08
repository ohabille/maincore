<?php

use \Domain\WebController as Ctrl,
    \Connectors\RequestsConnector as Requests,
    \Connectors\RoutesConnector as Routes,
    \Connectors\ViewConnector as Skeleton;

// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

//
$routes = Routes::getInst(Requests::getInst()->getRequest());

//
$task = '\\Models\\'. $routes->getParams()['model'];

//
$model = new $task($routes->getParams());

//
Skeleton::getInst(
        $routes->getParams()['template'],
        $model->getDatas()
)->readTemplate();

?>
