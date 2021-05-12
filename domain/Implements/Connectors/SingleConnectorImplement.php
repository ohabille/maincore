<?php

namespace DomainImplements\Connectors;

interface SingleConnectorImplement
{
    /**
     * Retourne une instance de la classe
     * @return \DomainImplements\Connectors\SingleConnectorImplement
     */
    public static function getInst();

    /**
     * Instanciation de la classe
     */
    public static function setInst() : void;
}
