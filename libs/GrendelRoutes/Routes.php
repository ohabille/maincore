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

    private function setParams(string $route) : void
    {
        if (!$this->isRoute($route))
            $route = $this->getDefaultRoute();

        $this->_params = $this->getRoutes()[$route];
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
