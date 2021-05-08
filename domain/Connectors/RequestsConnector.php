<?php

namespace Connectors;

use \GrendelRequests\Requests;

class RequestsConnector
implements  \DomainInterfaces\Connectors\ConnectorsImplement,
            \DomainInterfaces\Requests\RequestsImplement
{
    /**
     * @var \Connectors\RequestsConnector
     */
    private static $instance = null;
    /**
     * @var \DomainInterfaces\Connectors\RequestsImplement
     */
    private $_request;

    private function __construct(
        \DomainInterfaces\Requests\RequestsImplement $request
    )
    {
        // $this->_request = new Requests;
        $this->_request = $request;
    }

    public static function getInst(
    ) : \DomainInterfaces\Connectors\ConnectorsImplement
    {
        if (is_null(self::$instance))
            self::$instance = new RequestsConnector(new Requests);

        return self::$instance;
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
