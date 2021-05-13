<?php

use \Connecters\RoutesConnecter as Routes,
    \Connecters\ViewConnecter as Skeleton;

// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

//
$params = Routes::getParams();

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
