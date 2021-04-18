<?php

namespace GrendelRequests;

class GrendelRequests
implements  \MainInterfaces\SingleTonImplement,
            \DomainInterfaces\Controllers\RequestImplements
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    /**
     * @return stdClass : Les paramètres des routes
     */
    public function getRoutes() : \stdClass
    {
        return Routes::getInstance()->getRoutes();
    }

    /**
     * @return array : Les paramètres de la requète
     */
    public function getMatches() : array
    {
        return RoutesMatches::getInstance()->getMatches();
    }

    /**
     * @return string : le nom de la requète
     */
    public function getRequest() : string
    {
        return RouteRequest::getInstance()->getRequest();
    }

    /**
     * @return array : Les arguments de la requète
     */
    public function getArgs() : array
    {
        return RequestArgs::getInstance()->getArgs();
    }
}
