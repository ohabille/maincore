<?php

namespace CenturyDb\Methods;

trait CenturyReadMethods
{
    /**
     * Lit la base de donnée et applique une méthode fournit en paramètre
     * @param  string $task : la methode de référence
     * @return ?            : La valeur générée
     */
    protected function readCenturyDb(string $task)
    {
        $value = $this->getValueTask($task);

        if ($handle = opendir(self::$dbDir.$this->_dbName)) {
            while (false !== ($entry = readdir($handle))) {
                if (!self::isCenturyDirName($entry))  continue;

                $result = $this->$task($value, $entry);

                if (false === $result) break;
                else $value = $result;
            }

            closedir($handle);
        }

        return $value;
    }

    /**
     * Appèle la methode qui retourne la valeur initiale d'un traitement
     * @param  string $task : la methode de référence
     * @return ?            : la valeur initiale
     */
    protected function getValueTask(string $task)
    {
        $valueTask = $task.'Value';

        return $this->$valueTask();
    }

    /**
     * Lit le contenu d'une century
     * @return array : les données de la century
     */
    protected function readCentury(string $century) : array
    {
        $dir = self::$dbDir.$this->_dbName.'/'
            .self::$centName.$century;

        return array_slice(scandir($dir), 2);
    }
}
