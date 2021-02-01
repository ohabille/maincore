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

    private $_routes;
    private $_route;
    private $_matches;
    private $_arg;
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
        $this->_routes = $routes;
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
        $this->_arg = key($this->_routes->getArgs());


        $this->_args = isset($this->_matches[$this->_arg]) ?
            $this->findArg(): [];
    }

    private function findArg() : array
    {
        $pattern = isset($this->_route->{$this->_arg}) ?
            $this->_route->{$this->_arg}: current($this->_routes);

        $test = preg_match(
            '#'.$pattern.'#',
            $this->_matches[$this->_arg],
            $match
        );

        return empty($match) ? self::cleanMatch($match): $match;
    }

    private static function cleanMatch(array $match) : array
    {
        array_shift($match);
        return $match;
    }

    public function getArgs() : array
    {
        return $this->_args;
    }
}
