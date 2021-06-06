<?php

namespace Connecters\Db;

use \Adapters\Db\DbCenturySelectAdapter as SelectAdapter,
    \Adapters\Db\DbCenturySearchAdapter as SearchAdapter;

class DbConnecter
{
    private static $select = null;

    public static function getDbSelect(string $dbName, int $step = 1)
    {
        return new SelectAdapter($dbName, $step);
    }

    public static function getDbSearch(string $dbName)
    {
        return new SearchAdapter($dbName);
    }
}
