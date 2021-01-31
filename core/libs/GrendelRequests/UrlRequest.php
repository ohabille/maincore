<?php

/**
 * Initalise le nom de la requète
 */

namespace GrendelRequests;

class UrlRequest
implements  \MainPorts\Requests\UrlRequestImplement,
            \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;

    /**
     * Instance de classe
     * @var \MainPorts\Requests\RoutesImplement
     */
    private $_routes;
    /**
     * Instance de classe
     * @var \MainPorts\Requests\UrlMatchImplement
     */
    private $_matches;
    /**
     * Le nom de la requète
     * @var string
     */
    private $_request;

    private function __construct(
        \MainPorts\Requests\RoutesImplement $routes,
        \MainPorts\Requests\UrlMatchImplement $requests
    )
    {
        $this->_routes = $routes;
        $this->_matches = $requests;

        $this->setRequest();
    }

    public static function constructClass(
        \MainPorts\Requests\RoutesImplement $routes,
        \MainPorts\Requests\UrlMatchImplement $requests
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($routes, $requests);
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
            if (!$this->readRoutes()) {
                $this->_routes->nextRoute();
                continue;
            }

            return key($this->_routes->getRoutes());
        }

        return $this->_routes->getNotFound();
    }

    /**
     * vérifie l'existence de la requète url dans les routes disponible
     * @return bool
     */
    private function readRoutes() : bool
    {
        $pattern = current(
            $this->_routes->getRoutes()
        )->{'request'};

        return 0 != preg_match(
            "#^".$pattern."$#",
            $this->_matches->getMatches()[0]
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
