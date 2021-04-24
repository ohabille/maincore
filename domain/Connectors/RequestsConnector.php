<?php

namespace Connectors;

use \GrendelRequests\Requests;

class RequestsConnector
implements  \DomainInterfaces\Requests\RequestsImplement,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;
    /**
     * @var \GrendelRequests\Requests
     */
    private $_request;

    private function __construct()
    {
        $this->_request = new Requests;
    }

    /**
     * Retourne la requète transmise
     * @return string [description]
     */
    public function getRequest() : string
    {
        return $this->_request->getRequest();
    }

    /**
     * Retourne les paramètre transmis par $_POST
     * @return array [description]
     */
    public function getArgs() : array
    {
        return $this->_request->getArgs();
    }
}
