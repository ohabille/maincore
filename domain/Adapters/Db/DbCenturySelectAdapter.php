<?php

namespace Adapters\Db;

use \CenturyDb\CenturiesSelect as DbSelect;

class DbCenturySelectAdapter
{
    private $_select = null;

    public function __construct(string $dbName, int $step)
    {
        $this->_select = DbSelect::connectToDb('articles')->byStep($step);
    }

    /**
     * @return int : Le nombre total d'entrées
     */
    public function getTotal() : int
    {
        return $this->_select->getTotal();
    }

    /**
     * @return array : la sélection d'entrées
     */
    public function getSelect(int $from) : array
    {
        return $this->_select->sinceFrom($from)->getSelect();
    }
}
