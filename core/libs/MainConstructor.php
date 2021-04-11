<?php

namespace MainLib;

use \MainLib\DatasReader as Datas;

abstract class MainConstructor
{
    use \MainTraits\DatasConstructor;

    /**
     * @var \stdClass
     */
    protected $_ctrlConf;
    /**
     * @var \stdClass
     */
    protected $_datas;
    protected static $methods;

    public function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
    )
    {
        $conf = getConf('mainDatas');

        $this->_ctrlConf = $request->getRoutes()->{$request->getRequest()};

        $this->_datas = $this->_ctrlConf->{'datas'};

        self::$methods = Datas::getInstance();

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

    protected function setSelectedDatas(
        \stdClass $selected,
        string $name
    ) : void
    {
        foreach ($selected as $k=>$select) {
            self::$methods->setConf($name);

            $this->_datas->{$name}[] = $k;

            $this->_datas->{$k} = $this->findDatas($select, $k, $name);
        }
    }

    public function getDatas() : \stdClass
    {
        return $this->_datas;
    }
}
