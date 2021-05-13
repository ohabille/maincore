<?php

namespace Connecters;

use \Adapters\DatasReaderAdapter as Datas;

class DatasReaderConnecter
{
    use \DomainTraits\ConnectersInstance;

    /**
     * @var \Adapters\DatasReaderAdapter
     */
    private static $instance = null;

    /**
     */
    public static function setInst()
    {
        if (is_null(self::$instance)) self::$instance = Datas::getInst();
    }
}
