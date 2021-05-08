<?php

use \Connectors\RequestsConnector as Requests,
    \Connectors\RoutesConnector as Routes,
    \Connectors\ViewConnector as Skeleton;

// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

//
$params = Routes::getInst()->getParams();

//
$task = '\\Models\\'. $params['model'];

//
$model = new $task;

//
Skeleton::getInst(
        $params['template'],
        $model->getDatas()
)->readTemplate();

?>
