<?php

namespace CenturyDb;

class CenturiesSearch extends CenturiesSelect
{
    public function __contruct(string $dbName, int $step)
    {
        parent::__construct($dbName, $step);
    }

    public function searchInDb(string $field, string $value) : bool
    {
        return true;
    }

    public function getFinded() : array
    {
        return $this->_selected;
    }
}
