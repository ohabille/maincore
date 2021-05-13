<?php

namespace Connecters;

use \GrendelDatas\DatasReader as Datas;

class DatasReaderConnecter
{
    public static function getInst() : \DomainImplements\Datas\DatasReaderImplement
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
