<?php

namespace SendConnectors;

use \GrendelRequests\Requests;

class SendRequestsConnector
implements  \DomainImplements\Connectors\SingleConnectorImplement,
            \DomainImplements\Requests\RequestsImplement
{
    /**
     * @var \SendConnectors\SendRequestsConnector
     */
    private static $instance = null;
    /**
     * @var \DomainImplements\SendConnectors\RequestsImplement
     */
    private $_request;

    private function __construct(
        \DomainImplements\Requests\RequestsImplement $request
    )
    {
        $this->_request = $request;
    }

    public static function getInst(
    ) : \DomainImplements\Requests\RequestsImplement
    {
        if (is_null(self::$instance))
            self::$instance = new SendRequestsConnector(new Requests);

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
