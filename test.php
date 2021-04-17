<?php

use \GrendelRequests\GrendelRequests as Requests;

// Déclaration du fichier racine
define('ROOTDIRS', './');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

$request = Requests::getInstance();

dump($request->getRequest());

exec('php testScript.php test', $output);

dump($output[0]);
?>
