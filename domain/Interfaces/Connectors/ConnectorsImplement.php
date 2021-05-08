<?php

namespace DomainInterfaces\Connectors;

interface ConnectorsImplement
{
    /**
     * Retourne une instance de la classe
     * @return \DomainInterfaces\Connectors\ConnectorsImplement l'instance
     */
    public static function getInst();
}
