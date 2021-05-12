<?php

namespace GetConnectors;

use \GrendelRoutes\Routes,
    \SendConnectors\SendRequestsConnector as Requests;

class GetRoutesConnectors
implements \DomainImplements\Routes\RoutesImplements
{
    private $_route;

    public function __construct()
    {
        $this->_route = new Routes(Requests::getInst()->getRequest());
    }

    public function getParams() : array
    {
        return $this->_route->getParams();
    }

    /**
     * @return array : Les paramètres des routes
     */
    public static function getRoutes() : array
    {
        return Routes::getRoutes();
    }
}
