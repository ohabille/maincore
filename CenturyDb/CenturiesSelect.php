<?php

namespace CenturyDb;

class CenturiesSelect extends AbstractCentury
{
    use Methods\CenturySelectMethods;

    public function __construct(string $dbName, int $step = 1)
    {
        parent::__construct($dbName);

        $this->setStep($step);
    }

    /**
     * 'édite un fichier de cache select
     * @param string $cacheName : le nom de fichier du cache
     * @param int    $id        : l'identifiant du cache
     * @return bool             : La sélection d'entrées
     */
    protected function setCacheSelect(string $cacheName) : bool
    {
        $nbr = $this->totalEntries($this->_century);

        if ($nbr < 1) return false;

        $start = $this->calcStartEntry($this->_century, $this->_from);

        $end = $start + ($this->_step > $nbr ? $nbr: $this->_step);

        for ($i = $start; $i < $end; $i++) {
            $file = self::$centName.$this->_century.'/'
                .self::$entName.$this->centuryId($i).'.json';

            $this->editCacheFile(
                $cacheName,
                '"'.str_replace('/', '\/', $file).'"'
            );

            $this->_step--;

            if ($this->_step < 1) return true;

            if (self::$dbMulti < $i + 1) break;
        }

        if ($i > self::$dbMulti) {
            $this->_century -= $this->centuryId(
                $this->valueCentury($this->_century) - self::$dbMulti
            );

            if ($this->valueCentury($this->_century) < 0) return false;

            $this->_from = $this->valueCentury($this->_century) + 1;

            $this->setCacheSelect($cacheName);
        }

        return true;
    }

    /**
     * Retourne une sélection d'entrées
     * @param  int   $from : la première entrée
     * @return array       : La sélection d'entrées
     */
    public function getSelect(int $from = 1) : array
    {
        $this->_filters = [];

        $this->_from = $from;

        $cacheName = $this->getSelectCacheName();

        if (!$this->isCacheExist($cacheName)) {
            $this->_century = $this->centuryId(
                $this->calcCentury($this->_from)
            );

            $this->setCacheSelect($cacheName);
        }

        return $this->checkCacheEntries($cacheName);
    }
}
