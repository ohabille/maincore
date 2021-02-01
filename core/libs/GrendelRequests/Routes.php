<?php

/**
 * Initialise la configuration des routes
 */

namespace GrendelRequests;

class Routes
implements  \MainPorts\Requests\RoutesImplement,
            \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * Instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;
    /**
     * Configuration des routes
     * @var \stdClass
     */
    private $_conf;
    /**
     * Liste des routes
     * @var \stdClass
     */
    private $_routes;

    private function __construct()
    {
        $this->_conf = getConf('Routes/routesConf');
        $this->_routes = getConf('Routes/routes');
    }

    /**
     * Retourne les clefs de requète
     * @return array
     */
    public function getKeys() : array
    {
        return $this->_conf->{'keys'};
    }

    /**
     * Retourne les noms des arguments des routes
     * @return stdClass
     */
    public function getArgs() : \stdClass
    {
        return $this->_conf->{'args'};
    }

    /**
     * Retourne le pattern de recherche des routes
     * @return string
     */
    public function getMatchPattern() : string
    {
        return $this->_conf->{'pattern'};
    }

    /**
     * Retourne les routes disponibles
     * @return stdClass $_routes
     */
    public function getRoutes() : \stdClass
    {
        return $this->_routes;
    }

    /**
     * Retourne la route par défaut
     * @return string $_conf->{'default'}
     */
    public function getDefaultRoute() : string
    {
        return $this->_conf->{'default'};
    }

    /**
     * Retourne la route courante
     * @return stdClass|bool
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
        return $this->_conf->{'notFound'};
    }
}
