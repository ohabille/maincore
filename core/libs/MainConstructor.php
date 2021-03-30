<?php

namespace MainLib;

abstract class MainConstructor
{
    /**
     * @var \stdClass
     */
    protected $_conf;
    /**
     * @var \stdClass
     */
    protected $_datas;
    /**
     * @var \stdClass
     */
    protected $ctrlConf;

    public function __construct(\stdClass $CtrlConf)
    {
        $this->_conf = getConf('Controllers/main');

        $this->_datas = $CtrlConf->{'datas'};

        $this->_ctrlConf = $CtrlConf;

        $this->_datas->{'pageTitle'} = $this->_conf->{'mainTitle'}
            .'-'.$this->_datas->{'pageTitle'};

        $this->_datas->{'title'} =
            empty($this->_datas->{'title'}) ?
            $this->_conf->{'mainTitle'}:
            $this->_datas->{'title'};
    }

    public function getDatas() : \stdClass
    {
        return $this->_datas;
    }
}
