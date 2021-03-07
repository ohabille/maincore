<?php

use \GrendelRequests\GrendelRequests;
use \User\Test;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

// $servicesConf = parseConf('devs/injection');

$request = GrendelRequests::getInstance();

// dump($request->getArgs());

$test = Test::getInstance($request);

?>
