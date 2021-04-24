<?php

namespace Models;

class Categories
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        array $params, array $args
    )
    {
        parent::__construct($params, $args);
    }
}
