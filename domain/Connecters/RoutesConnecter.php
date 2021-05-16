<?php

namespace Connecters;

use \DomainImplements\Connecters\RoutesConnecterImplement;

class RoutesConnecter
implements  RoutesConnecterImplement
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
        return self::getInst()->getRouteParams();
    }

    /**
     * @return array : Les paramètres des routes
     */
    public static function getRoutes() : array
    {
        return self::getInst()::getRoutes();
    }
}
