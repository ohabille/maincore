<?php

namespace MainLib;

use \User\Test as Datas;

abstract class MainConstructor
{
    /**
     * @var \stdClass
     */
    protected $_datas;
    /**
     * @var \stdClass
     */
    protected $_ctrlConf;

    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        $conf = getConf('mainDatas');

        $this->_ctrlConf = $request->getRoutes()->{$request->getRequest()};

        $this->_datas = $this->_ctrlConf->{'datas'};

        $this->_datas->{'host'} = $conf->{'host'};

        $this->_datas->{'pageTitle'} = $conf->{'mainTitle'}
            .'-'.$this->_datas->{'pageTitle'};

        if (empty($this->_datas->{'title'}))
            $this->_datas->{'title'} = $conf->{'mainTitle'};

        foreach ($request->getRoutes() as $k=>$route) {
            if (!$route->{'menu'}) continue;

            $this->_datas->{'menu'}[] = $route->{'url'};
            $this->_datas->{'menu'.$route->{'url'}} = $route->{'name'};
        }
    }

    public function getDatas() : \stdClass
    {
        return $this->_datas;
    }
}
