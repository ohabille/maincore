<?php

namespace GrendelRoutes;

class Routes
implements  \DomainImplements\Routes\RoutesImplement
{
    use MethodsRoutes;

    /**
     * @var array
     */
    private $_params = [];

    public function __construct(string $request)
    {
        $this->setParams($request);
    }

    /**
     * Construit et retourne les paramètres d'une route
     * @return array $_params
     */
    public function findRouteParams(string $request) : array
    {
        $argv = array_slice(explode('/', $request), 1);

        for ($i = 0; $i < count($argv); $i += 2) {
            $x = isset($argv[$i + 1]) ? $i: $i - 1;
            $y = isset($argv[$i + 1]) ? $i + 1: $i;

            $params[$argv[$x]] = $argv[$y];
        }

        $route = $this->isRoute($params['request']) ?
            $params['request']:
            $this->getDefaultRoute();

        return array_merge($params, $this->getRoutes()[$route]);
    }

    /**
     * Construit les paramètres d'une route
     */
    public function setParams(string $request) : void
    {
        $this->_params = $this->findRouteParams($request);
    }

    /**
     * Retourne les paramètres d'une route
     * @return array $_params
     */
    public function getRouteParams() : array
    {
        return $this->_params;
    }
}
