<?php

use \GrendelRequests\GrendelRequests as Requests;
use \User\Controller;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

// $servicesConf = parseConf('devs/injection');

$request = Requests::getInstance();

// dump($request->getRequest());
// dump($request->getArgs());

$controller = Controller::getInstance($request);

?>
