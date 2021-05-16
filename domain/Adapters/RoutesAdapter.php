<?php

namespace Adapters;

use \DomainImplements\Adapters\RoutesAdapterImplement as RoutesImplement,
    \GrendelRoutes\Routes,
    \Connecters\RequestsConnecter as Requests;

class RoutesAdapter
implements  RoutesImplement
{
    /**
     * @var \GrendelRoutes\Routes
     */
    private $_routes;

    public function __construct()
    {
        $this->_routes = new Routes(Requests::getPage());
    }

    /**
     * Construit et retourne les paramètres d'une route
     * @return array $_params
     */
    public function findRouteParams(string $request) : array
    {
        return $this->_routes->findRouteParams($request);
    }

    /**
    * Construit les paramètres d'une route
    */
    public function setParams(string $request) : void
    {
        $this->_routes->setParams($request);
    }

    /**
     * Retourne les paramètres d'une route
     * @return array $_params
     */
    public function getRouteParams() : array
    {
        return $this->_routes->getRouteParams();
    }

    /**
     * Retourne les paramètres des routes
     * @return array : Les paramètres
     */
    public static function getRoutes() : array
    {
        return Routes::getRoutes();
    }
}
