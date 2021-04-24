<?php

namespace Models;

class Home
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
