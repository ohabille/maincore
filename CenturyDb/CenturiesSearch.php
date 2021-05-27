<?php

namespace CenturyDb;

class CenturiesSearch extends CenturiesSelect
{
    /**
     * @var string
     */
    protected $_field;
    /**
     * @var string
     */
    protected $_value;

    public function __contruct(string $dbName, int $step = 1)
    {
        parent::__construct($dbName, $step);
    }

    /**
     * Retourne une valeur vide
     * @return string
     */
    protected function findCenturyValue() : string
    {
        return '';
    }

    /**
     * Parcours les century et effectue la recherche
     * @param  string $value   : une valeur vide
     * @param  string $century : la century en cours de lecture
     * @return bool            : true
     */
    protected function findCentury(string $value, string $century) : bool
    {
        $this->_century = $century;

        $this->readCenturyDir($this->_dbName.'/'.$century, 'findField');

        return count($this->_selected) === $this->_step ? false: true;
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
    protected function findField(string $century, string $entry) : bool
    {
        $file = $this->_century.'/'.$entry;

        if (!$this->checkFindedField($this->readEntry($file))) return true;

        $cacheName = $this->getSearchCacheName($this->_value);

        if ($this->isCacheExist($cacheName))
            $selected = $this->getCacheEntries($cacheName);

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
        if (!isset($fields[$this->_field])) return false;

        if ($this->_value !== $fields[$this->_field]) return false;

        return true;
    }

    /**
     * Retourne le nom de fichier du cache select
     * @param  int    $value : l'identifiant du cache
     * @return string       : Le nom du cache
     */
    protected function getSearchCacheName(string $value) : string
    {
        return $this->_dbName.'_search-'.$value.'-'.$this->_step;
    }

    /**
     * Effectue une recherche
     * @param string $field : Le champ à tester
     * @param string $value : la valuer recherchée
     * @return array
     */
    public function findFieldInDb(string $field, string $value) : array
    {
        $cacheName = $this->getSearchCacheName($value);

        if (!$this->isCacheExist($cacheName)) {
            $this->_field = $field;
            $this->_value = $value;

            $this->readCenturyDir($this->_dbName, 'findCentury');
        }

        return $this->isCacheExist($cacheName) ?
            $this->getCacheEntriesFields($cacheName):
            [];
    }
}
