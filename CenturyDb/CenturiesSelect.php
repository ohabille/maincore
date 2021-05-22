<?php

namespace CenturyDb;

class CenturiesSelect extends AbstractCentury
{
    use Methods\CenturyNavigateMethods,
        Methods\CenturySelectMethods;

    /**
     * @var array
     */
    protected $_selected = [];

    public function __construct(string $dbName)
    {
        parent::__construct($dbName);

        $this->_century = $this->readCenturyDb('getFirstCentury');
    }

    /**
     * Sélectionne un nombre d'entrée
     * @param  int   $from : le numéro de la première entrée
     * @param  int   $step : le nombre d'entrées à sélectionner
     * @return array       : Les entrées sélectionnées
     */
    public function getSelectedEntries(int $from, int $step) : array
    {
        return $this->_selected;
    }
}
