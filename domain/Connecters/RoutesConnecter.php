<?php

namespace Connecters;

use \Adapters\RoutesAdapter as Route,
    \DomainImplements\Connecters\SingleConnecterImplement,
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

    private static function setInst() : void
    {
        if (is_null(self::$instance))
            self::$instance = new Route(Requests::getRequest());
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
