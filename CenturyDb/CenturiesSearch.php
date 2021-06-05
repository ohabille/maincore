<?php

namespace CenturyDb;

class CenturiesSearch extends AbstractCentury
{
    use Methods\CenturySelectMethods;

    public function __construct(string $dbName, int $step = 1)
    {
        parent::__construct($dbName);

        $this->setStep($step);
    }

    /**
     * Parcours une entrée et effectue la recherche
     * @param  string $century : la century
     * @param  string $entry   : l'entrée
     * @return bool
     */
    protected function findField(string $cacheName) : bool
    {
        if (!$this->compareFields()) return false;

        $nbr = $this->totalEntries($this->_century);

        if ($nbr < 1) return false;

        $start = $this->calcStartEntry($this->_century, $this->_from);

        $end = $start + $nbr;

        for ($i = $start; $i < $end; $i++) {
            $file = self::$centName.$this->_century.'/'
                .self::$entName.$this->centuryId($i).'.json';

            $fields = $this->readEntry($file);

            if (!$this->checkFindedField($fields)) continue;

            $this->editCacheFile(
                $cacheName,
                '"'.str_replace('/', '\/', $file).'"'
            );

            $this->_step--;

            if ($this->_step < 1) return true;

            if (self::$dbMulti < $i + 1) break;
        }

        if ($this->_step > 0) {
            $this->_century = $this->centuryId(
                $this->valueCentury($this->_century) - self::$dbMulti
            );

            if ($this->valueCentury($this->_century) < 0) return false;

            $this->_from = $this->valueCentury($this->_century) + 1;

            $this->findField($cacheName);
        }

        return true;
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
     * @param  array $fields : les champs et leur valeurs
     * @return bool          [description]
     */
    protected function checkFindedField(array $fields) : bool
    {
        $check = [];

        foreach ($this->_filters as $k=>$val)
            $check[$k] = $val === $fields[$k];

        return !in_array(false, $check);
    }

    /**
     * Retourne le nom de fichier du cache select
     * @param  int    $value : l'identifiant du cache
     * @return string       : Le nom du cache
     */
    protected function findFieldCacheName() : string
    {
        $cacheName = $this->getSelectCacheName();

        $cacheName .= '_search';

        foreach ($this->_filters as $k=>$val)
            $cacheName .= '-'.$k.'='.$val;

        return $cacheName;
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

        if (!$this->isCacheExist($cacheName)) {
            $this->_century = $this->centuryId(
                $this->getNbrCenturies() * self::$dbMulti
            );

            $this->findField($cacheName);
        }

        return $this->checkCacheEntries($cacheName);
    }
}
