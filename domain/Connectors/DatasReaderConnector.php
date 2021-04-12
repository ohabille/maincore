<?php

namespace Connectors;

use \GrendelDatas\DatasReader as Datas;

class DatasReaderConnector
{
    public static function getInstance() : \MainInterfaces\DatasReaderImplement
    {
        return Datas::getInstance();
    }

    public static function getConf(string $confName, string $conf) : array
    {
        Datas::getInstance()->setConf($confName);

        return Datas::getInstance()->getConf()->{$conf};
    }

    public static function getsectioncontent(
        string $from, string $file
    ) : string
    {
        return Datas::getInstance()->getsectioncontent($from, $file);
    }
}
