<?php

namespace Adapters\Db;

use \CenturyDb\CenturiesSearch as DbSearch;

class DbCenturySearchAdapter
{
    private $_search = null;
    private $_find = [];

    public function __construct(string $dbName)
    {
        // $this->_search = new DbSearch($dbName, $step);
        $this->_search = DbSearch::connectToDb($dbName);
    }

    /**
     * @return int : Le nombre total d'entrées
     */
    public function getTotal() : int
    {
        return $this->_search->getTotal();
    }

    /**
     * Effectue une sélection d'entrées
     * @param  array $filters : le tableau des filtres
     * @return bool           : le résultat de l'opération
     */
    public function findEntry(array $filters) : bool
    {
        $this->_find = $this->_search->withFilters($filters)
            ->getSelect()[0];

        return !empty($this->_find);
    }

    /**
     * @return array : la sélection d'entrées
     */
    public function getFindEntry() : array
    {
        return $this->_find;
    }
}
