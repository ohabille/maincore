<?php

namespace CenturyDb\Interfaces;

interface CenturySelectImplements
{
    /**
     * Initialise le nombre d'entrées à sélectionner
     * @param int $step
     */
    public function byStep(
        int $step = 1
    ) : \CenturyDb\Interfaces\CenturySelectImplements;

    /**
     * Intialise le numéro de la prmemière entrées
     * @param int $from
     */
    public function sinceFrom(
        int $from = 1
    ) : \CenturyDb\Interfaces\CenturySelectImplements;

    /**
     * Initialise les filtres
     * @param array $filters
     */
    public function withFilters(
        array $filters = []
    ) : \CenturyDb\Interfaces\CenturySelectImplements;

    /**
     * Retourne une sélection d'entrées
     * @return array       : La sélection d'entrées
     */
    public function getSelect() : array;

    /**
     * Calcule le nombre d'entrées à parcourir
     * @param  int $start : le numéro de la première entrée
     * @return int        : Le nombre d'entrées
     */
    public function calcEndSelect(int $start) : int;

    /**
     * Initialise l'id du Century
     */
    public function setCentury() : void;
}
