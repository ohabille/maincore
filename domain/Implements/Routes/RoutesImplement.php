<?php

namespace DomainImplements\Routes;

interface RoutesImplement
{
    /**
     * Construit les paramètres d'une route
     */
    public function setParams(string $request) : void;

    /**
     * Retourne les paramètres des routes
     * @return array : Les paramètres
     */
    public static function getRoutes() : array;

    /**
     * Retourne les paramètres d'une route
     * @return array $_params
     */
    public function getRouteParams() : array;

    /**
     * Construit et retourne les paramètres d'une route
     * @return array $_params
     */
    public function findRouteParams(string $request) : array;
}
