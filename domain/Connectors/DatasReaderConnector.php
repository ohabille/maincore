<?php

namespace Connectors;

use \GrendelDatas\DatasReader as Datas;

class DatasReaderConnector
{
    public static function getInst() : \DomainInterfaces\Datas\DatasReaderImplement
    {
        return Datas::getInst();
    }

    public static function getConf(string $confName, string $conf) : array
    {
        Datas::getInst()->setConf($confName);

        return Datas::getInst()->getConf()[$conf];
    }

    public static function getsectioncontent(
        string $from, string $file
    ) : string
    {
        return Datas::getInst()->getsectioncontent($from, $file);
    }
}
