<?php

namespace Adapters\Db;

use \CenturyDb\CenturiesSelect as DbSelect;

class DbCenturySelectAdapter
{
    private $_select = null;

    public function __construct(string $dbName, int $step)
    {
        $this->_select = new DbSelect($dbName, $step);
    }

    public function getTotal() : int
    {
        return $this->_select->getTotal();
    }

    public function getSelect(int $from) : array
    {
        return $this->_select->getSelect($from);
    }
}
