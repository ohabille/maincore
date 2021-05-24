<?php

namespace Connecters\Db;

use \Adapters\Db\DbCenturySelectAdapter as SelectAdapter;

class DbConnecter
{
    private static $select = null;

    public static function getDbSelect(string $dbName, int $step)
    {
        if (is_null(self::$select))
            self::$select =  new SelectAdapter($dbName, $step);

        return self::$select;
    }
}
