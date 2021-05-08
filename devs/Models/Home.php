<?php

namespace Models;

class Home
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct(
        array $params
    )
    {
        parent::__construct($params);
    }
}
