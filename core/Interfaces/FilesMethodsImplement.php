<?php

namespace MainInterfaces;

interface FilesMethodsImplement
{
    /**
     * Retourne le contenu d'un fichier
     * @param  string $file : Le path du fichier
     * @return string       : Le contenu du fichier
     */
    public function readContentFile(string $file) : string;

    /**
     * Retourne le répertoire source du projet
     * @return string : Le repertoire source
     */
    public static function getMainDir() : string;
}
