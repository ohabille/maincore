<?php

include_once('ClassAutoLoad.php');

/**
 * chargement du fichier de la classe
 * @param  string $className : Le nom de la classe
 */
function autoLoad(string $className) : void
{
    $class = new ClassAutoLoad($className);

    require($class->getClassFile());
}

/**
 * Enregistre la fonction d'autoload
 * @var string : le nomde la fonction
 */
spl_autoload_register('autoLoad');
