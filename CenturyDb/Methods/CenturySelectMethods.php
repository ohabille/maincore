<?php

namespace CenturyDb\Methods;

trait CenturySelectMethods
{
    /**
     * Calcule le century
     * @param  int $from [description]
     * @return int       [description]
     */
    protected function calcCentury(int $from) : int
    {
        return (int) ceil($from / self::$dbMulti) * 100;
    }

    /**
     * Calcule le numéro de la première entrée à sélectionner
     * @param  int $from : le numéro
     * @return int       : la première entrée
     */
    protected function calcStartEntry(int $from) : int
    {
        return $this->getCenturyValue() - self::$dbMulti + $from - 1;
    }

    /**
     * Sélectionne une partie d'une century
     * @param  int   $from : le numéro de la première entrée
     * @param  int   $step : le nombre d'entrées
     * @return array       : la sélection d'entrées
     */
    protected function selectInCentury(int $from, int $step) : array
    {
        return array_slice(
            $this->readCentury($this->_century),
            $from,
            $step
        );
    }

    /**
     * Sélectionne les entrées depuis le numéro fournit
     * @param int $from : le numéro
     */
    protected function setSelectedEntries(int $from) : void
    {
        $this->_century = $this->getCenturyId(
            $this->calcCentury($from)
        );

        $this->_selected = array_merge(
            $this->_selected,
            $this->selectInCentury(
                $this->calcStartEntry($from),
                $this->calcStep($from)
            )
        );

        $entries = count($this->_selected);

        if ($this->_step < $entries) {
            $this->setStep($this->_step - $entries);

            $this->setSelectedEntries($from + $entries);
        }
    }
}
