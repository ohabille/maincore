<?php

/**
 * Chargement du fichier autoLoad.php
 * @var string : Le fichier
 */
require_once 'autoLoad.php';

// Lecture des classes de function
$classes = json_decode(
    file_get_contents(
        ROOTDIRS.'confs/classFuncs.json'
    ), true
);


foreach ($classes as $class)
    $class['namespace']::getInst()
        ->setMethodsAlias($class['methods']);
