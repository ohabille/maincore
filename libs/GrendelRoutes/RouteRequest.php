<?php

/**
 * Initalise le nom de la requète
 */

namespace GrendelRoutes;

class RouteRequest
implements  \DomainInterfaces\Routes\RouteRequestImplement,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    /**
     * Instance de classe
     * @var \DomainInterfaces\Routes\RoutesImplement
     */
    private $_routes;
    /**
     * Instance de classe
     * @var \DomainInterfaces\Routes\UrlMatchImplement
     */
    private $_matches;
    /**
     * Le nom de la requète
     * @var string
     */
    private $_request;

    private function __construct()
    {
        $this->_routes = Routes::getInstance();
        $this->_matches = RoutesMatches::getInstance();

        $this->setRequest();
    }

    /**
     * Initialise la variable $_request
     */
    private function setRequest() : void
    {
        $this->_request =
            !empty($this->_matches->getMatches()) ?
            $this->findRequest():
            $this->_routes->getDefaultRoute();
    }

    /**
     * Recherche le nom de la requète
     * @return string
     */
    private function findRequest() : string
    {
        while (false !== $this->_routes->getCurrentRoute()) {
            if ($this->findRoute())
                return key($this->_routes->getRoutes());

            $this->_routes->nextRoute();
            continue;
        }

        return $this->_routes->getNotFound();
    }

    /**
     * vérifie l'existence de la requète url dans les routes disponible
     * @return bool
     */
    private function findRoute() : bool
    {
        $pattern = current(
            $this->_routes->getRoutes()
        )->{'request'};

        return 0 != preg_match(
            "#^".$pattern."$#",
            $this->_matches->getMatches()['request']
        );
    }

    /**
     * Retourne la requète
     * @return string
     */
    public function getRequest() : string
    {
        return $this->_request;
    }
}
