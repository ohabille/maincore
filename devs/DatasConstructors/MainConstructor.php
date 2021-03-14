<?php

namespace User\DatasConstructors;

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

    public function __construct(\stdClass $primaryDatas)
    {
        $this->_conf = getConf('Controllers/main');
        $this->_datas = $primaryDatas;

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
