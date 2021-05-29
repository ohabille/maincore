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
     */
    protected function setCacheSelect(string $cacheName, int $from) : void
    {
        $century = $this->getCenturyId(
            $this->calcCentury($from)
        );

        $start = $this->calcStartEntry($century, $from);

        $end = $start + $this->_step;

        for ($i = $start; $i < $end; $i++)
            $select[] = self::$centName.$century.'/'
                .self::$entName.$this->getCenturyId($i). '.json';

        $this->editCacheFile(
            $cacheName,
            json_encode(
                $select
            )
        );
    }

    /**
     * Retourne une sélection d'entrées
     * @param  int   $from : la première entrée
     * @return array       : La sélection d'entrées
     */
    public function getSelect(int $from = 1) : array
    {
        $cacheName = $this->getSelectCacheName($from);

        if (!$this->isCacheExist($cacheName))
            $this->setCacheSelect($cacheName, $from);

        return $this->isCacheExist($cacheName) ?
            $this->getCacheEntriesFields($cacheName): [];
    }
}
