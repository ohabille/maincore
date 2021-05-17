<?php

namespace Adapters\Db;

use \GrendelDb\Db;

class DbAdapter
{
    public static function getDb(
        string $dbName
    ) : \DomainImplements\DatasBases\DbImplement
    {
        return new Db($dbName);
    }
}
