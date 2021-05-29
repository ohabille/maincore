<?php

namespace CenturyDb\Methods;

trait CenturyReadMethods
{
    /**
     * Lit la base de donnée et applique une méthode fournit en paramètre
     * @param  string $task : la methode de référence
     * @return ?            : La valeur générée
     */
    protected function readCenturyDir(string $dir, string $task)
    {
        $value = $this->getValueTask($task);

        if ($handle = opendir(self::$dbDir.$dir)) {
            while (false !== ($find = readdir($handle))) {
                if (!self::isCenturyName($find))  continue;

                $result = $this->$task($find, $value);

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
        $task .= 'Value';

        return $this->$task();
    }

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
