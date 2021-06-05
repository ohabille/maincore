<?php

namespace CenturyDb\Methods;

trait CenturyReadMethods
{
    /**
     * Récupère et retourne les données de l'entrée
     * @param  string $fileName : le fichier de l'entrée
     * @return array            : les données de l'entrée
     */
    protected function readEntry(string $fileName) : array
    {
        return json_decode(
            file_get_contents(
                self::$dbDir.$this->_dbName.'/'.$fileName
            ),
            true
        );
    }
}
