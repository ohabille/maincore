<?php

namespace DomainInterfaces\Controllers;

interface RoutesImplements
{
    /**
     * Retourne le json des routes
     * @return stdClass : Les paramètres des routes
     */
    public function getRoutes() : \stdClass;

    /**
     * Retourne la requète principale
     * @return string
     */
    public function getParams() : \stdClass;

    /**
     * Retourne les arguments
     * @return array
     */
    public function getArgs() : array;
}
