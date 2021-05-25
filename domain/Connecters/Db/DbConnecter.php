<?php

namespace Connecters\Db;

use \Adapters\Db\DbCenturySelectAdapter as SelectAdapter,
    \Adapters\Db\DbCenturySearchAdapter as SearchAdapter;

class DbConnecter
{
    private static $select = null;

    public static function getDbSelect(string $dbName, int $step)
    {
        return new SelectAdapter($dbName, $step);
    }

    public static function getDbSearch(string $dbName, int $step = 1)
    {
        return new SearchAdapter($dbName, $step);
    }
}
