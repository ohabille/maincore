<?php

namespace User;

class Test
{
    /**
     * @var \stdClass
     */
    private $_routes;
    private $_requests;
    private $_request;
    /**
     * @var string
     */
    private $_uri;

    public function __construct()
    {
        $this->_routes = parseConf('devs/test')->{'routes'};
        $this->_uri = strip_tags(
            htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES)
        );
        $this->_requests = explode('/', $this->_uri);
        $this->_request = false === $this->isIndex() ?
            $this->parseUri():
            $this->_routes->{'index'}->{'name'};
    }

    private function isIndex()
    {

        return (
            empty($this->_requests[1])
            ||
            $this->matchRequest($this->_routes->{'index'}->{'patt'})
        );
    }

    private function parseUri()
    {
        foreach ($this->_routes as $route) {
            if ($this->matchRequest($route->{'patt'})) {
                return $route->{'name'};
            }
        }

        return $this->_routes->{'index'}->{'name'};
    }

    private function matchRequest(string $patt)
    {
        return 0 != preg_match("#".$patt."#", $this->_requests[1]);
    }

    public function getUri()
    {
        return $this->_uri;
    }

    public function getRequest()
    {
        return $this->_request;
    }
  }
