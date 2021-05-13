<?php

use \Connecters\RoutesConnecter as Routes,
    \Domain\Models\WebModel as Model,
    \Connecters\ViewConnecter as Skeleton;

// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

// Construit la vue html
Skeleton::getInst(
        Routes::getParams()['template'],
        Model::getDatas(
            Routes::getParams()['model']
        )
)->readTemplate();

?>
