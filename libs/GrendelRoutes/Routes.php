<?php

/**
 * Initialise la configuration des routes
 */

namespace GrendelRoutes;

class Routes
implements  \DomainInterfaces\Routes\RoutesImplement,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * Instance de la classe
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;
    /**
     * Configuration des routes
     * @var array
     */
    private $_conf;
    /**
     * Liste des routes
     * @var array
     */
    private $_routes;

    private function __construct()
    {
        $this->_conf = parseConf(__DIR__.'/jsons/routesConf');
        $this->_routes = parseConf(__DIR__.'/jsons/routes');
    }

    private function getRequestKey() : string
    {
        return $this->_conf['requestKey'];
    }

    /**
     * Retourne les clefs de requète
     * @return array
     */
    public function getKeys() : array
    {
        $keys = array_merge(
            [$this->getRequestKey()],
            array_keys($this->getArgs())
        );

        reset($this->_conf['args']);

        return $keys;
    }

    /**
     * Retourne les noms des arguments des routes
     * @return array
     */
    public function getArgs() : array
    {
        return $this->_conf['args'];
    }

    /**
     * Retourne le pattern de recherche des routes
     * @return string
     */
    public function getMatchPattern() : string
    {
        return $this->_conf['pattern'];
    }

    /**
     * Retourne les routes disponibles
     * @return array $_routes
     */
    public function getRoutes() : array
    {
        return $this->_routes;
    }

    /**
     * Retourne la route par défaut
     * @return string $_conf['default']
     */
    public function getDefaultRoute() : string
    {
        return $this->_conf['default'];
    }

    /**
     * Retourne la route courante
     * @return array|bool
     */
    public function getCurrentRoute()
    {
        return current($this->_routes);
    }

    /**
     * Avance le pointeur dans la configuration des routes
     */
    public function nextRoute() : void
    {
        next($this->_routes);
    }

    /**
     * Remet le pointeur au départ de la configuration des routes
     */
    public function resetRoutes() : void
    {
        reset($this->_routes);
    }

    /**
     * Retourne la route norFound
     * @return string
     */
    public function getNotFound() : string
    {
        return $this->_conf['notFound'];
    }
}
