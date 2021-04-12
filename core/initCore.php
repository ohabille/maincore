<?php

// Déclaration du fichier racine
define('ROOTDIRS', '../');

/**
 * Chargement du fichier autoLoad.php
 * @var string : Le fichier
 */
require_once 'autoLoad.php';

// Lecture des classes de function
$classes = json_decode(
    file_get_contents(
        ROOTDIRS.'confs/classFuncs.json'
    )
);

foreach ($classes as $class) {
    $class->{'namespace'}::getInstance()
        ->setMethodsAlias($class->{'methods'});
}

$dirs = getConf('classDirs');

foreach ($dirs->{'paths'} as $path) {
    define(strtoupper($path).'_DIR', $dirs->{$path});
}
