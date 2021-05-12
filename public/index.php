<?php

use \SendConnectors\SendRoutesConnector as Routes,
    \SendConnectors\SendViewConnector as Skeleton;

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
