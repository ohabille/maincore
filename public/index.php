<?php


// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

// \User\Test::setInstance('prout');

$conf = new \User\Test;

dump($conf->getConf());
?>
