<?php

namespace GrendelRequests;

class UrlArgs
implements  \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * Instance de la classe
     * @var
     */
    private static $instance;

    private $_routesArgs;
    private $_route;
    private $_matches;
    /**
     * [private description]
     * @var \stdClass
     */
    private $_args;

    private function __construct(
        \MainPorts\Requests\RoutesImplement $routes,
        array $matches,
        string $request
    )
    {
        $this->_routesArgs = $routes->getArgs();
        $this->_matches = $matches;
        $this->_route = $routes->getRoutes()->{$request};

        $this->setArgs();
    }

    private static function constructClass(
        \MainPorts\Requests\RoutesImplement $routes,
        array $matches,
        string $request
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($routes, $matches, $request);
    }

    private function setArgs() : void
    {
        next($this->_routesArgs);
        $arg = key($this->_routesArgs);
        dump($this->_route);

        $pattern =
            isset($this->_route->{$arg}) ?
            $this->_route->{$arg}:
            current($this->_routesArgs);

        dump($pattern);
        $test = preg_match('#'.$pattern.'#', $matches[$arg], $match);
        dump($test);
        dump($match);
    }

    public function getArgs() : \stdClass
    {
        return $this->_routes->getArgs();
    }
}
