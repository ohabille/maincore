<?php

namespace GrendelRequests;

class UrlArgs
implements  \MainInterfaces\SingleTonImplement
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
        \MainInterfaces\Requests\RoutesImplement $routes,
        array $matches,
        string $request
    )
    {
        $this->_routes = $routes;
        $this->_matches = $matches;
        $this->_route = $routes->getRoutes()->{$request};

        $this->setArgs();
    }

    private static function setInstance(
        \MainInterfaces\Requests\RoutesImplement $routes,
        \MainInterfaces\Requests\UrlMatchImplement $matches,
        \MainInterfaces\Requests\UrlRequestImplement $request
    ) : \MainInterfaces\SingleTonImplement
    {
        return new self::$class(
            $routes, $matches->getMatches(), $request->getRequest()
        );
    }

    private function setArgs() : void
    {
        $this->_arg = key($this->_routes->getArgs());

        $this->_args = $this->findArg();
    }

    private function findArg() : array
    {
        $test = preg_match(
            '#'.$this->getPattern().'#',
            $this->getMatchArg(),
            $match
        );
        if (0 != $test)
            return !empty($match) ? self::cleanMatch($match): $match;

        return [];
    }

    private function getPattern()
    {
        return isset($this->_route->{$this->_arg}) ?
            $this->_route->{$this->_arg}:
            current($this->_routes->getArgs());
    }

    private function getMatchArg()
    {
        return isset($this->_matches[$this->_arg]) ?
            $this->_matches[$this->_arg]: '';
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
