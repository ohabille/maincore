<?php

use \GrendelRequests\GrendelRequests;
use \User\Test;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

// $servicesConf = parseConf('devs/injection');

$grendelRequest = GrendelRequests::getInstance();

dump($grendelRequest->getArgs());

$test = Test::getInstance($grendelRequest);

?>
