<?php

namespace CenturyDb;

use \CenturyDb\Interfaces\CenturyDbImplements;

abstract class AbstractCentury
{
    use Methods\CacheMethods,
        Methods\CenturyReadMethods,
        Methods\CenturyCountMethods;

    /**
     * @var string
     */
    protected static $centName = 'century-';
    /**
     * @var string
     */
    protected static $entName = 'entry-';
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
     * Initialise une connexion à un DB
     * et retourne une instance de gestion
     * @param  string              $dbName : Le nom de la base de données
     * @return CenturyDbImplements         : Un instance de classe
     */
    public static function connectToDb(string $dbName) : CenturyDbImplements
    {
        $db = get_called_class();

        return new $db($dbName);
    }

    /**
     * Vérifie si le $dirName est un nom de century
     * @param  string $dirName
     * @return bool
     */
    protected static function isCenturyName(string $name) : bool
    {
        $patt = '#(('.self::$centName.'|'.self::$entName.')'
            .self::$centPattId.'(.json)?)#';

        return 1 === preg_match($patt, $name);
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
    protected function centuryId(int $century) : string
    {
        return dechex($century);
    }

    /**
     * Convertit un id hexadecimal en un multiple de 100
     * @param  string $centuryId : un id hexadecimal
     * @return int               : le multiple de 100
     */
    protected function valueCentury(string $centuryId) : int
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
        $patt = "#".self::$centName.self::$centPattId."#";

        preg_match($patt, $centuryName, $match);

        return $match[1];
    }
}
