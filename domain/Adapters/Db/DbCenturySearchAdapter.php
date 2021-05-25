<?php

namespace Adapters\Db;

use \CenturyDb\CenturiesSearch as DbSearch;

class DbCenturySearchAdapter
{
    private $_search = null;
    private $_find = [];

    public function __construct(string $dbName, int $step = 1)
    {
        $this->_search = new DbSearch($dbName, $step);
    }

    public function getTotal() : int
    {
        return $this->_search->getTotal();
    }

    public function findEntry(string $field, string $value) : bool
    {
        $this->_find = $this->_search->findFieldInDb($field, $value)[0];

        return !empty($this->_find);
    }

    public function getFindEntry() : array
    {
        return $this->_find;
    }
}
