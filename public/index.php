<?php

use \GrendelRequests\GrendelRequests as Requests;
use \Domain\WebController as Ctrl;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

//
$controller = Ctrl::getInstance(Requests::getInstance());

?>
