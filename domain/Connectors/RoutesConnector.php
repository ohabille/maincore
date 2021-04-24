<?php

namespace Connectors;

use \GrendelRoutes\Routes;

class RoutesConnector
implements  \DomainInterfaces\Controllers\RoutesImplements,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    private $_route;

    private function __construct(string $request)
    {
        $this->_route = new Routes($request);
    }

    public static function setInstance(
        string $request
    ) : \MainInterfaces\SingleTonImplement
    {
        return new self::$class($request);
    }

    /**
    * @return array : Les paramètres des routes
    */
    public function getRoutes() : array
    {
        return $this->_route->getRoutes();
    }

    public function getParams() : array
    {
        return $this->_route->getParams();
    }
}
