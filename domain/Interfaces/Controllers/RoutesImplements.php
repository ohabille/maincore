<?php

namespace DomainInterfaces\Controllers;

interface RoutesImplements
{
    /**
     * Retourne le json des routes
     * @return array : Les paramètres des routes
     */
    public function getRoutes() : array;

    /**
     * Retourne la requète principale
     * @return string
     */
    public function getParams() : array;

    /**
     * Retourne les arguments
     * @return array
     */
    public function getArgs() : array;
}
