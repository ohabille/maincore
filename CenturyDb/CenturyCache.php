<?php

namespace CenturyDb;

class CenturyCache
{
    /**
     * Créée un fichier de cache
     * @param string $cacheName : Le nom du fichier
     * @param mixed  $value     : le contenu du cache
     */
    public static function setCacheFile(string $cacheName, $value) : void
    {
        file_put_contents(self::getCachePath($cacheName), $value);
    }

    /**
     * Retourne le path d'un fichier de cache
     * @param  string $cacheName : le nom de fichier
     * @return string            : le path du fichier
     */
    public static function getCachePath(string $cacheName) : string
    {
        return __DIR__.'/Db/cache/'.$cacheName.'.txt';
    }

    /**
     * Vérifie l'existence d'un fichier de cache
     * @param  string $cacheName : le nom de fichier
     * @return bool              le résultat de la vérification
     */
    public static function isCacheFile(string $cacheName) : bool
    {
        return file_exists(self::getCachePath($cacheName));
    }

    /**
     * Retourne le contenu d'un fichier de cache
     * @param  string $cacheName : le nom de fichier
     * @return string            : Le contenu du cache
     */
    public static function getCacheContent(string $cacheName) : string
    {
        return file_get_contents(self::getCachePath($cacheName));
    }
}
