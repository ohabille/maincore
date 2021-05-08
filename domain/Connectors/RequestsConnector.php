<?php

namespace Connectors;

use \GrendelRequests\Requests;

class RequestsConnector
implements  \DomainInterfaces\Connectors\RequestsImplement,
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
}
