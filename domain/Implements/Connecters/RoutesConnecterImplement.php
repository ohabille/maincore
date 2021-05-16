<?php

namespace DomainImplements\Connecters;

use \DomainImplements\Routes\RoutesImplement,
    \DomainImplements\Connecters\SingleConnecterImplement;

interface RoutesConnecterImplement
extends RoutesImplement,
        SingleConnecterImplement

{
    /**
     * Retourne la requète principale
     * @return string
     */
    public static function getParams() : array;
}
