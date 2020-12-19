<?php

/**
 * Chargement du fichier autoLoad.php
 * @var string : Le fichier
 */
include_once('autoLoad.php');

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
