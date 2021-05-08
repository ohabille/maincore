<?php

namespace Connectors;

use \GrendelRoutes\Routes,
    \Connectors\RequestsConnector as Requests;

class RoutesConnector
implements  \DomainInterfaces\Connectors\RoutesImplements,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    private $_route;

    private function __construct()
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
