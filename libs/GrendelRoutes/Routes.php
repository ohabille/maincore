<?php

namespace GrendelRoutes;

class Routes
{
    use MethodsRoutes;

    /**
     * @var array
     */
    private $_params;

    public function __construct(string $request)
    {
        $this->setParams($request);
    }

    private function setParams(string $request) : void
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

        $this->_params = array_merge($params, $this->getRoutes()[$route]);
    }

    /**
     * Retourne les étapes des routes
     * @return array $_matches
     */
    public function getParams() : array
    {
        return $this->_params;
    }
}
