<?php

namespace Connecters;

use \GrendelRequests\Requests;

class RequestsConnecter
implements  \DomainImplements\Connecters\SingleConnectorImplement,
            \DomainImplements\Requests\RequestsImplement
{
    /**
     * @var \Connecters\RequestsConnecter
     */
    private static $instance = null;
    /**
     * @var \DomainImplements\Connecters\RequestsImplement
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
            self::$instance = new RequestsConnecter(new Requests);

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
