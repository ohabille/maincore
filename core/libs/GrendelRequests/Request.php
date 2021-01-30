<?php

/**
 * Initalise le nom de la requète
 */

namespace GrendelRequests;

class Request implements \MainPorts\Requests\RequestImplement
{
    /**
     * Instance de classe
     * @var \MainPorts\MatchRequestsImplement
     */
    private $_matches;
    /**
     * Le nom de la requète
     * @var string
     */
    private $_request;

    public function __construct(
        \MainPorts\Requests\MatchRequestsImplement $requests
    )
    {
        $this->_matches = $requests;

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
            'home';
    }

    /**
     * Recherche le nom de la requète
     * @return string
     */
    private function findRequest() : string
    {
        while (false !== current($this->_matches->getConf()->getRoutes())) {
            if (!$this->readRoutes()) {
                next($this->_matches->getConf()->getRoutes());
                continue;
            }

            return current(
                $this->_matches->getConf()->getRoutes()
            )->{'request'};
        }

        return 'notFound';
    }

    /**
     * vérifie l'existence de la requète url dans les routes disponible
     * @return bool
     */
    private function readRoutes() : bool
    {
        $pattern = current(
            $this->_matches->getConf()->getRoutes()
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
