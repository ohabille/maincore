<?php

namespace DomainImplements\Routes;

interface RoutesMethodsImplement extends RoutesImplement
{
    /**
    * Construit et retourne les paramètres d'une route
    * @return array $_params
    */
    public function findRouteParams(string $request) : array;

    /**
     * Construit les paramètres d'une route
     */
    public function setParams(string $request) : void;

    /**
     * Retourne les paramètres d'une route
     * @return array $_params
     */
    public function getRouteParams() : array;
}
