<?php

// Déclaration du fichier racine
define('ROOTDIRS', '../');

// chargement du fichier d'initialisation
include_once(ROOTDIRS.'core/init.php');

\User\Test::setInstance('caca');

?>
