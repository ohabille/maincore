<?php

namespace User\DatasConstructors;

class Home extends MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(\stdclass $primaryDatas, array $args)
    {
        parent::__construct($primaryDatas);

        echo $this->_datas->{'pageTitle'};
    }
}
