<?php

namespace CenturyDb;

class Db
{
    /**
     * @var string
     */
    private static $centuryName = 'century-';
    /**
     * @var string
     */
    private $_dbName;
    /**
     * @var int
     */
    private $_century;

    public function __construct(string $dbName)
    {
        $this->_dbName = __DIR__.'/Db/'.$dbName;

        $this->_century = $this->countCenturies();
    }

    /**
     * Compte le nombre de century
     * @return int : Le nombre de century
     */
    private function countCenturies() : int
    {
        $i = 0;

        if ($handle = opendir($this->_dbName)) {
            while (false !== ($entry = readdir($handle))) {
                if (!self::isCentury($entry))  continue;

                $i++;
            }

            closedir($handle);
        }

        return $i;
    }

    private static function isCentury(string $needle) : bool
    {
        $patt = "#century-([1-9a]*).json#";

        if (1 === preg_match($patt, $needle)) return true;

        return false;
    }

    /**
     * Lit le contenu d'une century
     * @return array : les données de la century
     */
    public function readCentury() : array
    {
        return parseConf(
            $this->_dbName.'/'.self::$centuryName.$this->_century
        );
    }

    /**
     * Compte le nombre d'entrée d'une century
     * @return int [description]
     */
    private function countCentury() : int
    {
        return count($this->readCentury());
    }

    /**
     * Compte le nombre total du nombre d'entrées
     * de la base de données
     * @return int [description]
     */
    public function getTotal() : int
    {
        return ($this->countCenturies() * 100) - 100 + $this->countCentury();
    }

    /**
     * [setNextCentury description]
     */
    public function setNextCentury() : void
    {
        /*
        TO DO
        hexdec & dechex ...
        */
    }
}
