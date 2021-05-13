<?php

namespace GetConnectors;

use \GrendelRoutes\Routes,
    \SendConnectors\SendRequestsConnector as Requests;

class GetRoutesConnectors
implements  \DomainImplements\GetConnectors\GetRoutesImplement
{
    private $_route;

    public function __construct()
    {
        $this->_route = new Routes(Requests::getInst()->getRequest());
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
        return $this->_route->getRouteParams();
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
