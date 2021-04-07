<?php

use \GrendelRequests\GrendelRequests as Requests;
use \MainLib\Controller as Ctrl;

// chargement du fichier d'initialisation
require_once '../core/initCore.php';

//
$controller = Ctrl::getInstance(Requests::getInstance());

?>
