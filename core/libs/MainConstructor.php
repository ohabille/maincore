<?php

namespace MainLib;

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

    public function __construct(\stdClass $CtrlConf)
    {
        $conf = getConf('mainDatas');

        $this->_datas = $CtrlConf->{'datas'};

        $this->_ctrlConf = $CtrlConf;

        $this->_datas->{'host'} = $conf->{'host'};

        $this->_datas->{'pageTitle'} = $conf->{'mainTitle'}
            .'-'.$this->_datas->{'pageTitle'};

        $this->_datas->{'title'} = empty($this->_datas->{'title'}) ?
            $conf->{'mainTitle'}:
            $this->_datas->{'title'};
    }

    public function getDatas() : \stdClass
    {
        return $this->_datas;
    }
}
