<?php

namespace CenturyDb\Methods;

trait CenturySelectMethods
{
    /**
     * @var int
     */
    protected $_step;
    /**
     * @var int
     */
    protected $_from;

    /**
     * @var array
     */
    protected $_filters;

    /**
     * Initialise le nombre d'ebtrées à sélectionner
     * @param int $step [description]
     */
    protected function setStep(int $step) : void
    {
        $this->_step = $step;
    }

    /**
     * Retourne le nom de fichier du cache select
     * @param  int    $id : l'identifiant du cache
     * @return string     : Le nom du cache
     */
    protected function getSelectCacheName() : string
    {
        return $this->_dbName.'_select-'.$this->_from
            .'_step-'.$this->_step;
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
        return $this->isCacheExist($cacheName) ?
            $this->getCacheEntriesFields($cacheName): [];
    }
}
