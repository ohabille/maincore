<?php

namespace MainLib;

class Request
{
    /**
     * @var \MainLib\Requests
     */
    private $_matches;
    /**
     * @var string
     */
    private $_request;

    public function __construct(\MainLib\MatchRequests $requests)
    {
        $this->_matches = $requests;

        $this->setRequest();
    }

    private function setRequest() : void
    {
        $this->_request =
            !empty($this->_matches->getMatches()) ?
            $this->findRequest():
            'home';
    }

    private function findRequest() : string
    {
        while (false !== current($this->_matches->getConf()->{'routes'})) {
            if (!$this->readRoutes()) {
                next($this->_matches->getConf()->{'routes'});
                continue;
            }

            return current($this->_matches->getConf()->{'routes'})->{'request'};
        }

        return 'notFound';
    }

    private function readRoutes() : bool
    {
        $pattern = current(
            $this->_matches->getConf()->{'routes'}
        )->{'request'};

        return 0 != preg_match(
            "#^".$pattern."$#",
            $this->_matches->getMatches()[0]
        );
    }

    public function getRequest() : string
    {
        return $this->_request;
    }
}
