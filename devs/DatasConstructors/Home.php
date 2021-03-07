<?php

namespace User\DatasConstructors;

class Home extends MainConstructor implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(array $args)
    {
        dump($args);
    }
}
