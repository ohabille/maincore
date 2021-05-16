<?php

namespace DomainImplements\Connecters;

use \DomainImplements\Connecters\SingleConnecterImplement;

interface RequestsConnecterImplement extends SingleConnecterImplement
{
    /**
     * Retourne la requète principale
     * @return string
     */
    public static function getPage() : string;
}
