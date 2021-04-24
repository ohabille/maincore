<?php

/**
 * Initialise la configuration des routes
 */

namespace GrendelRoutes;

trait MethodsRoutes
{
    public function getConf() : array
    {
        return parseConf(__DIR__.'/jsons/routesConf');
    }

    /**
     * Retourne les routes disponibles
     * @return array $_routes
     */
    public function getRoutes() : array
    {
        return parseConf(__DIR__.'/jsons/routes');
    }

    /**
    * Retourne la route par défaut
    * @return string getConf()['default']
    */
    public function getDefaultRoute() : string
    {
        return $this->getConf()['default'];
    }

    /**
     * Retourne la route norFound
     * @return string
     */
    public function getNotFound() : string
    {
        return $this->getConf()['notFound'];
    }

    public function isRoute(string $route) : bool
    {
        return isset($this->getRoutes()[$route]);
    }
}
