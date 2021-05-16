<?php

namespace Adapters;

use \DomainImplements\Adapters\RequestsAdapterImplement,
    \GrendelRequests\Requests;

class RequestsAdapter
implements  RequestsAdapterImplement
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
