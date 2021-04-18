<?php

namespace Models;

class Categories
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \DomainInterfaces\Controllers\RoutesImplements $params
    )
    {
        parent::__construct($params);
    }
}
