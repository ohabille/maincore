<?php

namespace User\DatasConstructors;

class NotFound extends MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(\stdclass $primaryDatas, array $args)
    {
        parent::__construct($primaryDatas);
    }
}
