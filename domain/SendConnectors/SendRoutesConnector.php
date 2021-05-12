<?php

namespace SendConnectors;

use \GrendelRoutes\Routes,
    \SendConnectors\SendRequestsConnector as Requests;

class SendRoutesConnector
implements  \DomainImplements\SendConnectors\SendConnectorsImplement,
            \DomainImplements\Routes\RoutesImplements
{
    /**
     * @var \CoreImplements\SendConnectorsImplement
     */
    private static $instance;

    private $_route;

    private function __construct(
        \DomainImplements\Routes\RoutesImplements $routes
    )
    {
        $this->_route = $routes;
    }

    public static function getInst(
    ) : \DomainImplements\SendConnectors\SendConnectorsImplement
    {
        if (is_null(self::$instance))
            self::$instance = new SendRoutesConnector(
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
