<?php

namespace GrendelRequests;

class MatchUri
{
    private $_request;

    public function __construct()
    {
        $this->_request = new \GrendelRequests\Request(
            new \GrendelRequests\MatchRequests(
                new \GrendelRequests\Routes
            )
        );
    }

    public function getRoute()
    {
        return $this->_request->getRequest();
    }
}
