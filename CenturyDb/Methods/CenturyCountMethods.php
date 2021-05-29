<?php

namespace CenturyDb\Methods;

trait CenturyCountMethods
{
    /**
    * @var int
    */
    protected $_step = 1;

    /**
     * Calcule le century
     * @param  int $from [description]
     * @return int       [description]
     */
    protected function calcCentury(int $from) : int
    {
        $total = $this->findTotalCache('Centuries');

        $difference = ($total * self::$dbMulti) - $from;

        $modulo = $difference % self::$dbMulti;

        $century = $from + $modulo;

        return $century;
    }

    /**
     * Calcule le numéro de la première entrée à sélectionner
     * @param  int $from : le numéro
     * @return int       : la première entrée
     */
    protected function calcStartEntry(string $century, int $from) : int
    {
        $nbrEntries = $this->findTotalEntries($century);

        return self::$dbMulti - $nbrEntries + $from;
    }

    /**
     * Vérifie si le cache existe et renvoie son contenu
     * L'édite si il n'existe pas
     * @param  string $cacheName : Le nom du cache
     * @param  string $dir       : Le répertoire à parcourir
     * @return int               : le total de fichiers dans le répertoire
     */
    protected function findTotalCache(
        string $cacheName, string $dir = ''
    ) : int
    {
        $cacheName = $this->_dbName.'_total_'.$cacheName;

        if (!$this->isCacheExist($cacheName))
            $this->editCacheFile(
                $cacheName,
                $this->readCenturyDir(
                    $this->_dbName.'/'.$dir,
                    'countFinded'
                )
            );

        return $this->isCacheExist($cacheName) ?
            (int) $this->getCacheContent($cacheName): 0;
    }

    /**
     * Renvoie le nombre d'entrées d'un century
     * @param  string $century : Le century à parcourir
     * @return int             : le total des entrées
     */
    protected function findTotalEntries(string $century) : int
    {
        return $this->findTotalCache(
            self::$centName.$century,
            self::$centName.$century
        );
    }

    /**
     * @return int : 0
     */
    protected function countFindedValue() : int
    {
        return 0;
    }

    /**
     * Compte le nombre d'entrées,
     * l'ajoute à la valeur fourni
     * et retourne le résultat
     * @param  int    $value : La valeur initiale
     * @return int          : le résultat
     */
    protected function countFinded() : int
    {
        return func_get_arg(1) + 1;
    }

    /**
     * Calcule le total d'entries
     * @return int : total
     */
    protected function calcTotal() : int
    {
        $total = $this->findTotalCache('Centuries') * 100;

        $total += $this->findTotalEntries($this->getCenturyId($total));

        $total -= self::$dbMulti;

        return $total;
    }

    /**
     * Compte le nombre total du nombre d'entrées
     * de la base de données
     * @return int : Le nombre total
     */
    public function getTotal() : int
    {
        $cacheName = $this->_dbName.'_total';

        if (!$this->isCacheExist($cacheName))
            $this->editCacheFile($cacheName, strval($this->calcTotal()));

        return $this->isCacheExist($cacheName) ?
            (int) $this->getCacheContent($cacheName): 0;
    }
}
