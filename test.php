<?php

use \GrendelRequests\Requests as Requests;

// Déclaration du fichier racine
define('ROOTDIRS', './');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/init.php';

$request = new Requests;

dump($request->getRequest());
// exec('php testScript.php test', $output);
// dump($output[0]);
?>
