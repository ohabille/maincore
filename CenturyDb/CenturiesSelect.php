<?php

namespace CenturyDb;

class CenturiesSelect extends AbstractCentury
{
    use CenturyMethods;

    /**
     * @var array
     */
    private $_selected = [];

    public function __construct(string $dbName)
    {
        parent::__construct($dbName);
    }

    public function getSelectedEntries(int $page, int $nbrPPage) : array
    {
        

        return $this->_selected;
    }
}
