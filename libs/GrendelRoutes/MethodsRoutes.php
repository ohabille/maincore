<?php

/**
 * Initialise la configuration des routes
 */

namespace GrendelRoutes;

trait MethodsRoutes
{
    /**
     * Retourne la configuration des routes
     * @return array : la configuration
     */
    public static function getConf() : array
    {
        return parseConf(__DIR__.'/jsons/routesConf');
    }

    /**
     * Retourne les paramètres des routes
     * @return array : Les paramètres
     */
    public static function getRoutes() : array
    {
        return parseConf(__DIR__.'/jsons/routes');
    }

    /**
     * Retourne la route par défaut
     * @return string getConf()['default']
     */
    public function getDefaultRoute() : string
    {
        return self::getConf()['default'];
    }

    /**
     * Retourne la route norFound
     * @return string
     */
    public function getNotFound() : string
    {
        return self::getConf()['notFound'];
    }

    public function isRoute(string $route) : bool
    {
        return isset(self::getRoutes()[$route]);
    }
}
