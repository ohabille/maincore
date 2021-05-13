<?php

namespace DomainImplements\Connecters;

interface SingleConnectorImplement
{
    /**
     * Retourne une instance de la classe
     * @return \DomainImplements\Connecters\SingleConnectorImplement
     */
    public static function getInst();
}
