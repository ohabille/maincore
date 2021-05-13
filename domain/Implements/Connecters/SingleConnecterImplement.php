<?php

namespace DomainImplements\Connecters;

interface SingleConnecterImplement
{
    /**
     * Retourne une instance de la classe
     * @return \DomainImplements\Connecters\SingleConnecterImplement
     */
    public static function getInst();
}
