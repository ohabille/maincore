<?php

namespace Connecters;

use \Adapters\RoutesAdapter as Route,
    \DomainImplements\Connecters\SingleConnecterImplement,
    \DomainImplements\Connecters\RoutesConnecterImplement;

class RoutesConnecter
implements  SingleConnecterImplement,
            RoutesConnecterImplement
{
    /**
     * @var \Adapters\RoutesAdapter
     */
    private static $instance;

    public static function getInst() : \Adapters\RoutesAdapter
    {
        self::setInst();

        return self::$instance;
    }

    public static function setInst() : void
    {
        if (is_null(self::$instance)) self::$instance = new Route();
    }

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
