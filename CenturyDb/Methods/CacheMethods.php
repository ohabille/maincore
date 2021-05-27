<?php

namespace CenturyDb\Methods;

use \CenturyDb\CenturyCache as Cache;

trait CacheMethods
{
    /**
     * Vérifie l'existence d'un cache
     * @param string $cacheName : le nom de fichier du cache
     * @param bool
     */
    protected function isCacheExist(string $cacheName) : bool
    {
        return Cache::isCacheFile($cacheName);
    }

    /**
     * Édite un fichier de cache
     * @param  string $cacheName : Le nom du cache
     * @param  string $datas     : Les données à écrire
     * @return bool              : le résultat de l'opération
     */
    protected function editCacheFile(string $cacheName, string $datas) : bool
    {
        Cache::setCacheFile($cacheName, $datas);

        return Cache::isCacheFile($cacheName);
    }

    /**
     * Retourne le contenu d'un cache
     * @param  string $cacheName : Le nom du cache
     * @return string             : Le contenu du cache
     */
    protected function getCacheContent(string $cacheName) : string
    {
        return Cache::getCacheContent($cacheName);
    }
}
