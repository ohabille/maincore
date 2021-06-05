<?php

use \Connecters\RoutesConnecter as Routes,
    \Domain\Models\WebModel as Model,
    \Connecters\ViewConnecter as Skeleton;

// chargement du fichier d'initialisation
require_once '../spinalCord.php';

// Construit la vue html
Skeleton::getInst(
        Routes::getParams()['template'],
        Model::getDatas(
            Routes::getParams()['model']
        )
)->readTemplate();

?>
