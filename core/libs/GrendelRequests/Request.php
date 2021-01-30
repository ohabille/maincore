<?php

/**
 * Initalise le nom de la requète
 */

namespace GrendelRequests;

class Request
implements  \MainPorts\Requests\RequestImplement,
            \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;

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

    private function __construct(
        \MainPorts\Requests\MatchRequestsImplement $requests
    )
    {
        $this->_matches = $requests;

        $this->setRequest();
    }

    public static function constructClass(
        \MainPorts\Requests\MatchRequestsImplement $requests
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($requests);
    }

    /**
     * Initialise la variable $_request
     */
    private function setRequest() : void
    {
        $this->_request =
            !empty($this->_matches->getMatches()) ?
            $this->findRequest():
            $this->_matches->getConf()->getDefaultRoute();
    }

    /**
     * Recherche le nom de la requète
     * @return string
     */
    private function findRequest() : string
    {
        while (false !== $this->_matches->getConf()->getCurrentRoute()) {
            if (!$this->readRoutes()) {
                $this->_matches->getConf()->nextRoute();
                continue;
            }

            return key($this->_matches->getConf()->getRoutes());
        }

        return $this->_matches->getConf()->getNotFound();
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
