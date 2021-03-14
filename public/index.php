<?php

use \GrendelRequests\GrendelRequests;
use \User\Test as Controller;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

// $servicesConf = parseConf('devs/injection');

$request = GrendelRequests::getInstance();

// dump($request->getRequest());
// dump($request->getArgs());

$test = Controller::getInstance($request);

?>
