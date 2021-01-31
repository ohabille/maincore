<?php

use \GrendelRequests\GrendelRequests;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

// $servicesConf = parseConf('devs/injection');

$grendelRequest = GrendelRequests::getInstance();

dump($grendelRequest->instanceOf('Routes')->getRoutes());
dump($grendelRequest->instanceOf('UrlMatches')->getMatches());
dump($grendelRequest->instanceOf('UrlRequest')->getRequest());

?>
