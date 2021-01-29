<?php

namespace MainLib;

class Routes implements \MainPorts\RoutesImplement
{
    /**
     * @var \stdClass
     */
    private $_conf;

    public function __construct()
    {
        $this->_conf = getConf('routes');
    }

    public function getConf() : \stdClass
    {
        return $this->_conf;
    }
}
