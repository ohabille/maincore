<?php

namespace CenturyDb;

use \CenturyDb\CenturyCache as Cache;

class CenturiesSelect extends AbstractCentury
{
    use Methods\CenturyNavigateMethods,
        Methods\CenturySelectMethods;

    /**
     * @var int
     */
    protected $_step;
    /**
     * @var array
     */
    protected $_selected = [];

    public function __construct(string $dbName, int $step = 1)
    {
        parent::__construct($dbName);

        $this->setStep($step);
    }

    /**
     * Initialise le nombre d'ebtrées à sélectionner
     * @param int $step [description]
     */
    protected function setStep(int $step) : void
    {
        $this->_step = $step;
    }

    /**
     * Calcule le nombre d'entrées à sélectionner
     * à partir d'un numéro fournit
     * @param  int $from : le numéro
     * @return int       : le nombre d'entrées
     */
    protected function calcStep(int $from) : int
    {
        if ($this->getTotal() < $from + $this->_step)
            $this->setStep(
                ($from + $this->_step) - $this->getTotal()
            );

        return $this->getCenturyValue() < $from + $this->_step ?
            $this->getCenturyValue() - $from:
            $this->_step;
    }

    /**
     * Retourne les données de entrées mises en cache
     * @param  string $cacheName : Le nom du cache
     * @return array             : Les entrées sélectionnées
     */
    protected function getCacheEntriesFields(string $cacheName) : array
    {
        $select = [];

        foreach ($this->getCacheEntries($cacheName) as $file)
            $select[] = $this->readEntry($file);

        return $select;
    }

    /**
     * Retourne les entrées mise en cache
     * @param  string $cacheName : Le nom du cache
     * @return array             : Les entrées sélectionnées
     */
    protected function getCacheEntries(string $cacheName) : array
    {
        return json_decode(Cache::getCacheFile($cacheName), true);
    }

    /**
     * Vérifie l'existence d'un cache
     * et l'édite si il n'existe pas
     * @param string $cacheName : le nom de fichier du cache
     * @param int    $id        : l'identifiant du cache
     */
    protected function CheckCacheSelect(string $cacheName, int $id) : void
    {
        if (!Cache::isCacheFile($cacheName))
            Cache::setCacheFile(
                $cacheName,
                json_encode(
                    $this->getSelectedEntries($id)
                )
            );
    }

    /**
     * Retourne une sélection d'entrées
     * @param  int   $from : la première entrée
     * @return array       : La sélection d'entrées
     */
    public function getSelect(int $from) : array
    {
        $select = [];

        $cacheName = $this->getSelectCacheName($from);

        $this->CheckCacheSelect($cacheName, $from);

        return $this->getCacheEntriesFields($cacheName);
    }
}
