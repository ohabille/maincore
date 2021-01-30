<?php

/**
 * Initialise la configuration des routes
 * ex :
 * {
 *      "pattern" :"(\\/([_\\-a-zA-Z0-9]+))",
 *      "routes" : {
 *          "home" : {
 *          "request" : "home"
 *      },
 *      "article" : {
 *          "request" : "article"
 *          "slug" : ([_a-zA-Z0-9]+)
 *      }
 * }
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
     * @var \stdClass
     */
    private $_conf;

    private function __construct()
    {
        $this->_conf = getConf('routes');
    }

    public function getMatchPattern() : string
    {
        return $this->_conf->{'pattern'};
    }

    public function getRoutes() : \stdClass
    {
        return $this->_conf->{'routes'};
    }

    public function getCurrentRoute()
    {
        return current($this->_conf->{'routes'});
    }

    public function nextRoute() : void
    {
        next($this->_conf->{'routes'});
    }

    public function resetRoutes() : void
    {
        reset($this->_conf->{'routes'});
    }

    public function getDefaultRoute() : string
    {
        return $this->_conf->{'default'};
    }

    public function getNotFound() : string
    {
        return 'notFound';
    }
}
