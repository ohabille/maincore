<?php

namespace GrendelRequests;

class GrendelRequests
implements  \DomainInterfaces\Controllers\RequestImplements,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    public function getRoutes()
    {
        return Routes::getInstance()->getRoutes();
    }

    public function getMatches()
    {
        return RoutesMatches::getInstance()->getMatches();
    }

    public function getRequest() : string
    {
        return RouteRequest::getInstance()->getRequest();
    }

    public function getArgs() : array
    {
        return RequestArgs::getInstance()->getArgs();
    }
}
