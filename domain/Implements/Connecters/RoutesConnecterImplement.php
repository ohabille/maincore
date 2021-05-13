<?php

namespace DomainImplements\Connecters;

interface RoutesConnecterImplement
{
    /**
     * Retourne la requète principale
     * @return string
     */
    public static function getParams() : array;

    /**
     * @return array : Les paramètres des routes
     */
    public static function getRoutes() : array;
}
