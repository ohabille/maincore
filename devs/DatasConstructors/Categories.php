<?php

namespace User\DatasConstructors;

class Categories
extends \MainLib\MainConstructor
implements \MainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);
    }
}
