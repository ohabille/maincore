<?php

namespace CenturyDb;

use \CenturyDb\Interfaces\CenturySelectImplements as SelectImplements,
    \CenturyDb\Interfaces\CenturyDbImplements;

class CenturiesSelect
extends AbstractCentury
implements  CenturyDbImplements,
            SelectImplements
{
    use Methods\CenturySelectMethods;

    public function __construct(string $dbName)
    {
        parent::__construct($dbName);
    }

    /**
     * Calcule le nombre d'entrées à parcourir
     * @param  int $start : le numéro de la première entrée
     * @return int        : Le nombre d'entrées
     */
    public function calcEndSelect(int $start) : int
    {
        $nbr = $this->totalEntries($this->_century);

        return $start + ($this->_step > $nbr ? $nbr: $this->_step);
    }

    /**
     * Initialise l'id du Century
     */
    public function setCentury() : void
    {
        $this->_century = $this->centuryId(
            $this->calcCentury($this->_from)
        );
    }
}
