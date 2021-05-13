<?php

namespace DomainImplements\Connecters;

use \DomainImplements\Routes\RoutesImplement;

interface RoutesConnecterImplement extends RoutesImplement
{
    /**
     * Retourne la requète principale
     * @return string
     */
    public static function getParams() : array;
}
