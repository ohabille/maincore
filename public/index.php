<?php

use \Domain\WebController as Ctrl;

// Déclaration du fichier racine
define('ROOTDIRS', dirname(__DIR__).'/');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

//
$controller = Ctrl::getInstance();

?>
