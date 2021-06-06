<?php

namespace CenturyDb\Interfaces;

interface CenturyDbImplements
{
    /**
     * Initialise une connexion à un DB
     * et retourne une instance de gestion
     * @param  string              $dbName : Le nom de la base de données
     * @return CenturyDbImplements         : Un instance de classe
     */
    public static function connectToDb(
        string $dbName
    ) : CenturyDbImplements;
}
