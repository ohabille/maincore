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
     * Retourne le nom de fichier du cache select
     * @param  int    $from : l'identifiant du cache
     * @return string       : Le nom du cache
     */
    protected function getSelectCacheName(int $id) : string
    {
        return $this->_dbName.'_select-'.$id.'-'.$this->_step;
    }

    /**
     * Sélectionne les entrées depuis le numéro fournit
     * @param int $from : le numéro
     * @return array    : La sélection d'entrées
     */
    protected function getSelectedEntries(
        int $from,
        array $selected = []
    ) : array
    {
        $selected = array_merge(
            $selected,
            $this->findEntries($from)
        );

        return $this->CheckNbrEntries($from, $selected);
    }

    /**
     * Vérifie que le nombre d'entrées soit juste
     * Relance une sélection si nécessaire
     * @param int   $from     : le numéro de départ
     * @return array          : La sélection d'entrées
     */
    protected function CheckNbrEntries(int $from, array $selected) : array
    {
        $entriesNbr = count($this->_selected);

        if ($this->_step < $entriesNbr) {
            $this->setStep($this->_step - $entriesNbr);

            $selected = $this->getSelectedEntries(
                $from + $entriesNbr,
                $selected
            );
        }

        return $selected;
    }

    /**
     * Sélectionne les Entrées
     * @param  int   $from [description]
     * @return array       [description]
     */
    protected function findEntries(int $from) : array
    {
        $this->_century = $this->getCenturyId(
            $this->calcCentury($from)
        );

        return $this->selectInCentury(
            $this->calcStartEntry($from),
            $this->calcStep($from)
        );
    }
}
