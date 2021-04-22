<?php

namespace Connectors;

use \GrendelRoutes\Routes,
    \GrendelRoutes\RoutesMatches as Matches,
    \GrendelRoutes\RequestArgs as Args;

class RoutesConnector
implements  \DomainInterfaces\Controllers\RoutesImplements,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    public static function setInstance(
        string $request
    ) : \MainInterfaces\SingleTonImplement
    {
        Matches::getInstance($request);

        return new self::$class;
    }

    /**
    * @return array : Les paramètres des routes
    */
    public function getRoutes() : array
    {
        return Routes::getInstance()->getRoutes();
    }

    public function getParams() : array
    {
        $name = Matches::getInstance()->getMatches()['request'];

        return Routes::getInstance()->getRoutes()[$name];
    }

    /**
     * @return array : Les arguments de la requète
     */
    public function getArgs() : array
    {
        return Args::getInstance()->getArgs();
    }
}
