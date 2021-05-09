<?php

namespace GrendelDb;

class Search
implements  \CoreInterface\SingleTonImplement,
            \DomainInterfaces\DatasBases\DbSearchImplement
{
    use \CoreTraits\Instance;

    private static $instance;
    private $_mainDb;
    private $_db;
    private $_find = [];

    private function __construct(
        \DomainInterfaces\DatasBases\DbImplement $mainDb
    )
    {
        $this->_mainDb = $mainDb;
    }

    private static function setInstance(
        \DomainInterfaces\DatasBases\DbImplement $mainDb
    ) : \CoreInterface\SingleTonImplement
    {
        return new self::$class($mainDb);
    }

    private function setCurrentDB() : void
    {
        $this->_db = parseConf(__DIR__.'/db/'
            .$this->_mainDb->getDbName().'/'
            .$this->_mainDb->getKeyMainNode().'-'
            .$this->_mainDb->getKeyNode()
        );
    }

    private function findInDb(string $from, string $needle) : bool
    {
        if (!$this->isInDb($from)) return false;

        do {
            if (current($this->_db)[$from] == $needle) {
                $this->_find[key($this->_db)] = current($this->_db);

                return true;
            }
        } while (false !== next($this->_db));

        return false;
    }

    public function isInDb(string $from) : bool
    {
        $this->setCurrentDb();

        return isset(current($this->_db)[$from]);
    }

    public function searchInDb(string $from, string $needle) : bool
    {
        $this->setCurrentDb();

        if (!$this->findInDb($from, $needle)) {
            if (!$this->_mainDb->nextNode()) return false;

            return $this->searchInDb($from, $needle);
        }

        $this->_mainDb->resetNode();

        return true;
    }

    public function getKeyCurrent() : string
    {
        return key($this->_find);
    }

    public function getCurrent() : array
    {
        return current($this->_find);
    }

    public function getFind() : array
    {
        return $this->_find;
    }
}
