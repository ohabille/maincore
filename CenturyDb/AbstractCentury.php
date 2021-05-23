<?php

namespace CenturyDb;

abstract class AbstractCentury
{
    use Methods\CenturyReadMethods,
        Methods\CenturyCountMethods;

    /**
     * @var string
     */
    protected static $centName = 'century-';
    /**
     * @var string
     */
    protected static $centPattId = '([0-9a-f]+)';
    /**
     * @var int
     */
    protected static $dbMulti = 100;
    /**
     * @var string
     */
    protected static $dbDir = __DIR__.'/Db/';
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
        $this->_dbName = $dbName;
    }

    /**
     * Vérifie si le $dirName est un nom de century
     * @param  string $dirName
     * @return bool
     */
    protected static function isCenturyDirName(string $dirName) : bool
    {
        $patt = '#'.self::$centName.self::$centPattId.'#';

        return 1 === preg_match($patt, $dirName);
    }

    /**
     * Vérifie si le $fileName est un nom d'entry
     * @param  string $fileName
     * @return bool
     */
    protected static function isEntryFileName(string $fileName) : bool
    {
        $patt = '#entry-.'.self::$centPattId.'#';

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
        return dechex($century);
    }

    /**
     * Convertit l'id du century initialisé en multiple de 100
     * @return int : le multiple de 100
     */
    protected function getCenturyValue() : int
    {
        return hexdec($this->_century);
    }

    /**
     * Convertit un id hexadecimal en un multiple de 100
     * @param  string $centuryId : un id hexadecimal
     * @return int               : le multiple de 100
     */
    protected function getValueId(string $centuryId) : int
    {
        return hexdec($centuryId);
    }

    /**
     * Récupère et retourne l'id de la century
     * @param  string $centuryName Le
     * @return string              [description]
     */
    protected function extractCenturyId(string $centuryName) : string
    {
        $patt = "#".self::$centName
            .self::$centPattId."#";

        preg_match($patt, $centuryName, $match);

        return $match[1];
    }

    /**
     * @return string : Une string vide
     */
    protected function getFirstCenturyValue() : string
    {
        return "";
    }

    /**
     * Récupère l'id d'une entrée
     * et la retourne si la valeur fournie est vide
     * ou false si la valeur fournie contient déjà un id
     * @param  string $value : La valeur fournie
     * @param  string $entry : L'entrée à analiser
     * @return mixed
     */
    protected function getFirstCentury(string $value, string $entry)
    {
        if (!empty($value)) return false;

        return $this->extractCenturyId($entry);
    }
}
