<?php

namespace Connectors;

use \GrendelRoutes\Routes,
    \Connectors\RequestsConnector as Requests;

class RoutesConnector
implements  \DomainInterfaces\Connectors\ConnectorsImplement,
            \DomainInterfaces\Routes\RoutesImplements
{
    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    private $_route;

    private function __construct(
        \DomainInterfaces\Routes\RoutesImplements $routes
    )
    {
        $this->_route = $routes;
    }

    public static function getInst(
    ) : \DomainInterfaces\Connectors\ConnectorsImplement
    {
        if (is_null(self::$instance))
            self::$instance = new RoutesConnector(
                new Routes(Requests::getInst()->getRequest())
            );

        return self::$instance;
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
