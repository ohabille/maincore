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
$request = Requests::getInst();

//
// $routes = Routes::getInst($request->getRequest());
$routes = Routes::getInst($request->getArgs()['model']);

//
$task = '\\Models\\'. $routes->getParams()['model'];

//
$model = new $task($routes->getParams(), $request->getArgs());

//
Skeleton::getInst(
        $routes->getParams()['template'],
        $model->getDatas()
)->readTemplate();

// Instanciation du controller
// $controller = Ctrl::getInst($request, $routes);

?>
