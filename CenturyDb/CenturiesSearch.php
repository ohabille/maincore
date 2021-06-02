<?php

namespace CenturyDb;

class CenturiesSearch extends AbstractCentury
{
    use Methods\CenturySelectMethods;

    /**
     * @var array
     */
    protected $_filters;

    public function __construct(string $dbName, int $step = 1)
    {
        parent::__construct($dbName);

        $this->setStep($step);
    }

    /**
     * Retourne une valeur vide
     * @return string
     */
    protected function findCenturyValue() : string
    {
        return 'findField';
    }

    /**
     * Parcours les century et effectue la recherche
     * @param  string $value   : une valeur vide
     * @param  string $century : la century en cours de lecture
     * @return bool            : true
     */
    protected function findCentury(string $century, string $task) : bool
    {
        $this->_century = $century;

        $this->readCenturyDir($this->_dbName.'/'.$century, $task);

        $taskCache = $task.'CacheName';

        $selected = $this->checkCacheEntries(
            $this->$taskCache()
        );

        return (count($selected) === $this->_step) ? false: true;
    }

    /**
     * Retourne une valeur vide
     * @return string
     */
    protected function findFieldValue() : string
    {
        return '';
    }

    /**
     * Parcours une entrée et effectue la recherche
     * @param  string $century : la century
     * @param  string $entry   : l'entrée
     * @return bool
     */
    protected function findField(string $entry) : bool
    {
        $file = $this->_century.'/'.$entry;

        if (!$this->checkFindedField($this->readEntry($file))) return true;

        $cacheName = $this->findFieldCacheName();

        $selected = $this->checkCacheEntries($cacheName);

        $selected[] = $file;

        $this->editCacheFile($cacheName, json_encode($selected));

        if (count($selected) === $this->_step) return false;

        return true;
    }

    /**
     * Vérifie les champs de l'entrée
     * @param  array $fields : les champs et leur valeurs
     * @return bool          [description]
     */
    protected function checkFindedField(array $fields) : bool
    {
        $check = [];

        foreach ($this->_filters as $k=>$val) {
            if (!array_key_exists($k, $fields)) continue;

            $check[$k] = $val === $fields[$k];
        }

        return !in_array(false, $check);
    }

    /**
     * Retourne le nom de fichier du cache select
     * @param  int    $value : l'identifiant du cache
     * @return string       : Le nom du cache
     */
    protected function findFieldCacheName() : string
    {
        $str = $this->_dbName.'_search';

        foreach ($this->_filters as $k=>$val)
            $str .= '-'.$k.'='.$val;

        return $str.'-from='.$this->_from.'-step='.$this->_step;
    }

    /**
     * Effectue une recherche
     * @param array  $filters : Le filtre [field=>$value, field=>value]
     * @param int    $step    : le nombre d'entrées à retenir
     * @param int    $from    : le numéro d'entrée de départ
     * @return array $select  : Les entrées sélectionnées
     */
    public function findFieldInDb(array $filters, int $from = 1) : array
    {
        $this->_filters = $filters;
        $this->_from = $from;

        $cacheName = $this->findFieldCacheName();

        if (!$this->isCacheExist($cacheName))
            $this->readCenturyDir($this->_dbName, 'findCentury');

        return $this->isCacheExist($cacheName) ?
            $this->getCacheEntriesFields($cacheName):
            [];
    }
}
