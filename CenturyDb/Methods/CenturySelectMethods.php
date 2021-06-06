<?php

namespace CenturyDb\Methods;

use \CenturyDb\Interfaces\CenturySelectImplements as SelectImplements;

trait CenturySelectMethods
{
    /**
     * @var int
     */
    protected $_step = 1;
    /**
     * @var int
     */
    protected $_from = 1;

    /**
     * @var array
     */
    protected $_filters = [];

    /**
     * Initialise le nombre d'entrées à sélectionner
     * @param int $step
     */
    public function byStep(int $step = 1) : SelectImplements
    {
        $this->_step = $step;

        return $this;
    }

    /**
     * Intialise le numéro de la prmemière entrées
     * @param int $from
     */
    public function sinceFrom(int $from = 1) : SelectImplements
    {
        $this->_from = $from;

        return $this;
    }

    /**
     * Initialise les filtres
     * @param array $filters
     */
    public function withFilters(array $filters = []) : SelectImplements
    {
        $this->_filters = $filters;

        return $this;
    }

    /**
     * Retourne une sélection d'entrées
     * @return array       : La sélection d'entrées
     */
    public function getSelect() : array
    {
        return $this->checkCacheEntries($this->getSelectCacheName());
    }

    /**
     * Retourne le nom de fichier du cache select
     * @return string     : Le nom du cache
     */
    protected function getSelectCacheName() : string
    {
        $cacheName = $this->_dbName.'_select-'.$this->_from
            .'_step-'.$this->_step;

        if (!empty($this->_filters)) {
            $cacheName .= '_search';

            foreach ($this->_filters as $k=>$val)
                $cacheName .= '-'.$k.'='.$val;
        }

        return $cacheName;
    }

    /**
     * Retourne les entrées mise en cache
     * @param  string $cacheName : Le nom du cache
     * @return array             : Les entrées sélectionnées
     */
    protected function getCacheEntries(string $cacheName) : array
    {
        $entries = '['.$this->getCacheContent($cacheName).']';
        return json_decode($entries, true);
    }

    /**
     * Retourne les données de entrées mises en cache
     * @param  string $cacheName : Le nom du cache
     * @return array             : Les entrées sélectionnées
     */
    protected function getCacheEntriesFields(string $cacheName) : array
    {
        foreach ($this->getCacheEntries($cacheName) as $k=>$file)
            $select[$k] = $this->readEntry($file);

        return $select;
    }

    /**
     * Vérifie l'existence d'un cache et renvoie son contenu formaté
     * ou un tableau vide si il n'existe pas
     * @param  string $cacheName : Le nom du cache
     * @return array             : Le contenu sous forme de tableau
     */
    protected function checkCacheEntries(string $cacheName) : array
    {
        if (!$this->isCacheExist($cacheName)) {
            $this->setCentury();

            $this->selectEntries($cacheName);
        }

        return $this->isCacheExist($cacheName) ?
            $this->getCacheEntriesFields($cacheName): [];
    }

    /**
     * Vérifie si le filtre est valide
     * @return bool : le résultat de la validité du filtre
     */
    protected function compareFields() : bool
    {
        if (empty($this->_filters)) return true;

        $fields = json_decode(
            file_get_contents(self::$dbDir.$this->_dbName.'/fields.json'),
            true
        );

        $compare = count(
            array_diff_key($fields, $this->_filters)
            ) + count($this->_filters);

        return $compare === count($fields);
    }

    /**
     * Vérifie les champs de l'entrée
     * @param  string $file : les champs et leur valeurs
     * @return bool
     */
    protected function checkFindedField(string $file) : bool
    {
        $fields = $this->readEntry($file);

        $check = [];

        foreach ($this->_filters as $k=>$val)
            $check[$k] = $val === $fields[$k];

        return !in_array(false, $check);
    }

    protected function selectEntries(string $cacheName) : bool
    {
        if (!$this->compareFields()) return false;

        $nbr = $this->totalEntries($this->_century);

        if ($nbr < 1) return false;

        $start = $this->calcStartEntry($this->_century, $this->_from);

        $end = $this->calcEndSelect($start);

        for ($i = $start; $i < $end; $i++) {
            $file = self::$centName.$this->_century.'/'
                .self::$entName.$this->centuryId($i).'.json';

            if (!$this->checkFindedField($file)) continue;

            $this->editCacheFile(
                $cacheName,
                '"'.str_replace('/', '\/', $file).'"'
            );

            $this->_step--;

            if ($this->_step === 0) return true;

            if (self::$dbMulti < $i + 1) break;
        }

        if ($this->_step > 0) {
            $this->_century = $this->centuryId(
                $this->valueCentury($this->_century) - self::$dbMulti
            );

            if ($this->valueCentury($this->_century) < 0) return false;

            $this->_from = $this->valueCentury($this->_century) + 1;

            $this->selectEntries($cacheName);
        }

        return true;
    }
}
