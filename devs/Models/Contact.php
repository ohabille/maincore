<?php

namespace Models;

class Contact
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \DomainInterfaces\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);
    }
}
