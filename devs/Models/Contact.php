<?php

namespace Models;

class Contact
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
