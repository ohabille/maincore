<?php

use \GrendelRequests\GrendelRequests;
use \User\Controller;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

// $servicesConf = parseConf('devs/injection');

$request = GrendelRequests::getInstance();

// dump($request->getRequest());
// dump($request->getArgs());

$controller = Controller::getInstance($request);

?>
