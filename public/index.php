<?php

use \GrendelRequests\GrendelRequests;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

// $servicesConf = parseConf('devs/injection');

$grendelRequest = GrendelRequests::getInstance();

// dump($grendelRequest->getRoutes());
// dump($grendelRequest->getMatches());
dump($grendelRequest->getRequest());
dump($grendelRequest->getArgs());
?>
