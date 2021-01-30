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

class Routes implements \MainPorts\Requests\RoutesImplement
{
    /**
     * @var \stdClass
     */
    private $_conf;

    public function __construct()
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
}
