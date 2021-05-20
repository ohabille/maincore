<?php

namespace CenturyDb;

abstract class AbstractCentury
{
    /**
     * @var string
     */
    protected static $centName = 'century-';
    /**
     * @var int
     */
    protected static $dbMulti = 100;
    /**
     * @var string
     */
    protected $_dbName;
    /**
     * @var int
     */
    protected $_century;

    public function __construct(string $dbName)
    {
        $this->_dbName = __DIR__.'/Db/'.$dbName;

        $this->_century = $this->getCenturyId(
            $this->countCenturies()
        );
    }

    /**
     * Vérifie si le $fileName est une nom de century
     * @param  string $fileName
     * @return bool
     */
    protected static function isCenturyFileName(string $fileName) : bool
    {
        $patt = '#'.self::$centName.'([0-9a-f]*).json#';

        return 1 === preg_match($patt, $fileName);
    }

    /**
     * Vérifie si une century existe
     * @param  string $century
     * @return bool
     */
    public function isCenturyExists(string $century) : bool
    {
        $file = __DIR__.'/Db/'.$this->_dbName.'/'
        .self::$centName.$century.'json';

        return file_exists($file);
    }

    /**
     * Convertit un un multiple de 100 en id hexadecimal
     * @param  int    $century : un multiple de 100
     * @return string          : l'id hexadecimal
     */
    protected function getCenturyId(int $century) : string
    {
        return dechex($century * self::$dbMulti);
    }

    /**
     * Convertit un id hexadecimal en un multiple de 100
     * @param  string $centuryId : un id hexadecimal
     * @return int               : le multiple de 100
     */
    protected function getReverseId(string $centuryId) : int
    {
        return hexdec($centuryId);
    }

    /**
     * Compte le nombre de century
     * @return int : Le nombre de century
     */
    protected function countCenturies() : int
    {
        $i = 0;

        if ($handle = opendir($this->_dbName)) {
            while (false !== ($entry = readdir($handle))) {
                if (!self::isCenturyFileName($entry))  continue;

                $i++;
            }

            closedir($handle);
        }

        return $i;
    }

    /**
     * Compte le nombre d'entrée d'une century
     * @return int [description]
     */
    protected function countCentury() : int
    {
        return count($this->readCentury());
    }

    /**
     * Lit le contenu d'une century
     * @return array : les données de la century
     */
    protected function readCentury() : array
    {
        return parseConf(
            $this->_dbName.'/'.self::$centName.$this->_century
        );
    }

    /**
     * Compte le nombre total du nombre d'entrées
     * de la base de données
     * @return int [description]
     */
    public function getTotal() : int
    {
        return
        (
            $this->countCenturies() * self::$dbMulti
        ) - self::$dbMulti + $this->countCentury();
    }
}
