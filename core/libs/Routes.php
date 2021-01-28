<?php

namespace MainLib;

class Routes
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
