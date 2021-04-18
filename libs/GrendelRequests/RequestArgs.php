<?php

namespace GrendelRequests;

class RequestArgs
implements  \DomainInterfaces\Requests\RequestArgsImplement,
            \MainInterfaces\SingleTonImplement
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

    private function __construct()
    {
        $request = RouteRequest::getInstance()->getRequest();
        $this->_routes = Routes::getInstance();
        $this->_matches = RoutesMatches::getInstance()->getMatches();
        $this->_route = $this->_routes->getRoutes()->{$request};

        $this->setArgs();
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
