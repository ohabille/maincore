<?php

namespace CenturyDb\Methods;

trait CenturyCountMethods
{
    /**
     * Retourn un nom de fichier de cache de total
     * @param  string $cacheName : le nom additionnel du cache
     * @return string            : Le nom du cache
     */
    protected function totalCacheName(string $cacheName = '') : string
    {
        return $this->_dbName.'_total'.$cacheName;
    }

    /**
     * Retourne le total de centuries
     * édite le cache si il n'existe pas
     * @return int : le total de centuries
     */
    protected function getNbrCenturies() : int
    {
        $cacheName = $this->totalCacheName('_centuries');

        if (!$this->isCacheExist($cacheName))
            exec(
                'php '.self::$dbDir.'cacheNbrCentury.php '
                .$this->_dbName
                .' '.$this->_dbName.'/'
                .' _centuries 1'
            );

        return (int) $this->getCacheContent($cacheName);
    }

    /**
     * Calcule le total d'entries et édite le cache
     * Si il n'existe pas déjà
     */
    protected function calcTotal() : void
    {
        $cacheName = $this->totalCacheName();

        if (!$this->isCacheExist($cacheName)) {
            $total = $this->getNbrCenturies() * 100;

            $total += $this->totalEntries($this->centuryId($total));

            $total -= self::$dbMulti;

            $this->editCacheFile($cacheName, $total);
        }
    }

    /**
     * Calcule le century
     * @param  int $from : Le numéro de la première entrée
     * @return int       : l'id de la century concernée
     */
    protected function calcCentury(int $from) : int
    {
        return (int) ceil(
            ($this->getTotal() - $from) / self::$dbMulti
        ) * self::$dbMulti;
    }

    /**
     * Calcule le numéro de la première entrée à sélectionner
     * @param  int    $from : le numéro donné
     * @return int          : la première entrée
     */
    protected function calcStartEntry(int $from) : int
    {
        return $this->calcCentury($from) - $this->getTotal() + $from;
    }

    /**
     * Renvoie le nombre d'entrées d'un century
     * @param  string $century : Le century à parcourir
     * @return int             : le total des entrées
     */
    protected function totalEntries(string $century) : int
    {
        $cacheName = $this->totalCacheName('_'.self::$centName.$century);

        if (!$this->isCacheExist($cacheName))
            exec(
                'php '.self::$dbDir.'cacheNbrCentury.php '
                .$this->_dbName
                .' '.$this->_dbName.'/'.self::$centName.$century.'/'
                .' _'.self::$centName.$century
            );

        return $this->isCacheExist($cacheName) ?
            (int) $this->getCacheContent($cacheName): 0;
    }

    /**
     * Compte le nombre total du nombre d'entrées
     * de la base de données
     * @return int : Le nombre total
     */
    public function getTotal() : int
    {
        $cacheName = $this->totalCacheName();

        if (!$this->isCacheExist($cacheName))
            $this->calcTotal();

        return $this->isCacheExist($cacheName) ?
            (int) $this->getCacheContent($cacheName): 0;
    }
}
