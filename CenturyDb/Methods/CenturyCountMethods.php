<?php

namespace CenturyDb\Methods;

use \CenturyDb\CenturyCache as Cache;

trait CenturyCountMethods
{
    /**
     * Retourne 0
     * @return int : 0
     */
    protected function countCenturiesValue() : int
    {
        return 0;
    }

    /**
     * Compte le nombre d'entrée d'une century,
     * l'ajoute à la valeur fourni
     * et retourne le résultat
     * @param  int    $value : La valeur initiale
     * @param  string $entry : la century à parcourir
     * @return int          : le résultat
     */
    protected function countCenturies(int $value, string $entry) : int
    {
        $value += $this->getValueId(
            $this->extractCenturyId($entry)
        );

        return $value;
    }

    /**
     * Compte le nombre d'entrée d'une century
     * @return int
     */
    protected function countCentury(string $century) : int
    {
        return count($this->getCenturyEntries($century));
    }

    /**
     * Calcule le total d'entries
     * @return int : total
     */
    protected function calcTotal() : int
    {
        $nbrCenturies = $this->readCenturyDir($this->_dbName, 'countCenturies') - self::$dbMulti;

        $nbrEntries = $this->countCentury(
            $this->readCenturyDir($this->_dbName, 'getFirstCentury')
        );

        return $nbrCenturies + $nbrEntries;
    }

    /**
     * Compte le nombre total du nombre d'entrées
     * de la base de données
     * @return int : Le nombre total
     */
    public function getTotal() : int
    {
        $cacheName = $this->_dbName.'_total';

        if (!Cache::isCacheFile($cacheName))
            Cache::setCacheFile($cacheName, $this->calcTotal());

        return (int) Cache::getCacheFile($cacheName);
    }
}
