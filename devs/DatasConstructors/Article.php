<?php

namespace User\DatasConstructors;

class Article
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);
    }
}
