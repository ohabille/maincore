<?php

/**
 * Chargement de la classe ClassAutoLoad
 * @var string : Le fichier
 */
include_once('ClassAutoLoad.php');

/**
 * Fonction de chargement du fichier de la classe
 * @param  string $className : Le nom de la classe
 */
function autoLoad(string $className) : void
{
    require(ClassAutoLoad::getAutoLoad()->getClassFile($className));
}

/**
 * Enregistre la fonction d'autoload
 * @var string : le nomde la fonction
 */
spl_autoload_register('autoLoad');

\Core\CoreFunctions\CoreFunctions::setCoreFunctions();
