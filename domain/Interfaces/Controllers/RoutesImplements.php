<?php

namespace DomainInterfaces\Controllers;

interface RoutesImplements
{
    /**
     * Retourne la requète principale
     * @return string
     */
    public function getParams() : array;

    /**
     * @return array : Les paramètres des routes
     */
    public static function getRoutes() : array;
}
