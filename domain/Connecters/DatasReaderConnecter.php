<?php

namespace Connecters;

class DatasReaderConnecter
{
    use \DomainTraits\ConnectersInstance;

    /**
     * @var \Adapters\DatasReaderAdapter
     */
    private static $instance = null;
    /**
     * @var string
     */
    private static $class = "\Adapters\DatasReaderAdapter";

    public function getMainDatas() : array
    {
        return self::getInst()->getMainDatas();
    }

    public function isConf(string $name) : bool
    {
        return self::getInst()->isConf($name);
    }

    public function setConf(string $name) : void
    {
        self::getInst()->setConf($name);
    }

    public function getConf() : array
    {
        return self::getInst()->getConf();
    }

    public function getTime(int $time) : array
    {
        return self::getInst()->getTime($time);
    }

    public function getSections(string $file) : array
    {
        return self::getInst()->getSections($file);
    }

    public function getsectioncontent(string $section, string $file) : string
    {
        return self::getInst()->getsectioncontent($section, $file);
    }
}
