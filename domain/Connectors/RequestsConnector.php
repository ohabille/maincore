<?php

namespace Connectors;

use \GrendelRequests\Requests;

class RequestsConnector
implements  \DomainImplements\Connectors\ConnectorsImplement,
            \DomainImplements\Requests\RequestsImplement
{
    /**
     * @var \Connectors\RequestsConnector
     */
    private static $instance = null;
    /**
     * @var \DomainImplements\Connectors\RequestsImplement
     */
    private $_request;

    private function __construct(
        \DomainImplements\Requests\RequestsImplement $request
    )
    {
        $this->_request = $request;
    }

    public static function getInst(
    ) : \DomainImplements\Connectors\ConnectorsImplement
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
