<?php

namespace User\DatasConstructors;

abstract class MainConstructor
{
    protected $_datas = [];

    public function getDatas() : array
    {
        return $this->_datas;
    }
}
