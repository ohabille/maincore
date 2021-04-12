<?php

namespace Models;

class Home
extends \Domain\MainConstructor
implements \MainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);
    }
}
