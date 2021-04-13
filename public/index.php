<?php

use \GrendelRequests\GrendelRequests as Requests;
use \Domain\WebController as Ctrl;

// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

//
$controller = Ctrl::getInstance(Requests::getInstance());

?>
