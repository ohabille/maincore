<?php


// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
require_once ROOTDIRS.'core/initCore.php';

$conf = new \User\Test;

// echo 'test';
dump($conf->getUri());
dd($conf->getConf());
?>
