<?php

namespace Connecters;

use \DomainImplements\Connecters\SingleConnecterImplement,
    \Connecters\RequestsConnecter as Requests,
    \DomainImplements\Connecters\RoutesConnecterImplement;

class RoutesConnecter
implements  SingleConnecterImplement,
            RoutesConnecterImplement
{
    use \DomainTraits\ConnectersInstance;

    /**
     * @var \Adapters\RoutesAdapter
     */
    private static $instance;
    /**
     * @var string
     */
    private static $class = '\Adapters\RoutesAdapter';

    public static function getParams() : array
    {
        return self::getInst(self::$class)->getRouteParams();
    }

    /**
     * @return array : Les paramètres des routes
     */
    public static function getRoutes() : array
    {
        return self::getInst(self::$class)::getRoutes();
    }
}
