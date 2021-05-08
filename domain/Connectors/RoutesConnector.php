<?php

namespace Connectors;

use \GrendelRoutes\Routes;

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

    private function __construct(string $route)
    {
        $this->_route = new Routes($route);
    }

    private static function setInstance(
        string $route
    ) : \MainInterfaces\SingleTonImplement
    {
        return new self::$class($route);
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
