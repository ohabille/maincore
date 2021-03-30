<?php

namespace User\DatasConstructors;

class Categorie
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(\stdclass $primaryDatas, array $args)
    {
        parent::__construct($primaryDatas);
    }
}
