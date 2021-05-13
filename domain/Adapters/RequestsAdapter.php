<?php

namespace Adapters;

use \DomainImplements\Requests\RequestsImplement,
    \GrendelRequests\Requests;

class RequestsAdapter
implements  RequestsImplement
{
    /**
     * @var \GrendelRequests\Requests
     */
    private $_requests = null;

    public function __construct()
    {
        $this->_requests = new Requests;
    }

    /**
     * Retourne la requète
     * @return string [description]
     */
    public function getRequest() : string
    {
        return $this->_requests->getRequest();
    }
}
