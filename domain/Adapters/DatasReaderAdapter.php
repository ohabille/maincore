<?php

namespace Adapters;

use \GrendelDatas\DatasReader as Datas;

class DatasReaderAdapter
implements  \DomainImplements\Datas\DatasReaderImplement
{
    private $_datas;

    private function __construct()
    {
        $this->_datas = new Datas;
    }

    public static function getInst()
    {
        return new DatasReaderAdapter;
    }

    public function getMainDatas() : array
    {
        return $this->_datas->getMainDatas();
    }

    public function isConf(string $name) : bool
    {
        return $this->_datas->isConf($name);
    }

    public function setConf(string $name) : void
    {
        $this->_datas->setConf($name);
    }

    public function getConf() : array
    {
        return $this->_datas->getConf();
    }

    public function getTime(int $time) : array
    {
        return $this->_datas->getTime($time);
    }

    public function getSections(string $file) : array
    {
        return $this->_datas->getSections($file);
    }

    public function getsectioncontent(string $section, string $file) : string
    {
        return $this->_datas->getsectioncontent($section, $file);
    }
}
