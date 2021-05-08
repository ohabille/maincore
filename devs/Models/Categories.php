<?php

namespace Models;

class Categories
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct()
    {
        parent::__construct($params);
    }
}
