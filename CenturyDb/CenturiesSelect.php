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

    public function __construct(string $dbName, int $step)
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
     * Sélectionne et met en cache un nombre d'entrée définies
     * Si la sélection n'existe pas déjà,
     * et retourne le contenu du cache
     * @param  int   $from : le numéro de la première entrée
     * @return array       : Les entrées sélectionnées
     */
    protected function getCacheEntries(int $from) : array
    {
        $cacheName = $this->getSelectCacheName($from);

        $this->CheckCacheSelect($cacheName, $from);

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

        foreach ($this->getCacheEntries($from) as $k=>$file) {
            $select[] = $this->readEntry($file);
        }

        return $select;
    }
}
