<?php

namespace GrendelDb;

use \Connectors\DatasReaderConnectors as Datas;

class Search
implements  \MainInterfaces\SingleTonImplement,
            \MainInterfaces\DatasBases\DbSearchImplement
{
    use \MainTraits\Instance;

    private static $instance;
    private $_mainDb;
    private $_db;
    private $_find;

    private function __construct(
        \MainInterfaces\DatasBases\DbImplement $mainDb
    )
    {
        $this->_mainDb = $mainDb;

        $this->_find = new \stdClass();
    }

    public static function setInstance(
        \MainInterfaces\DatasBases\DbImplement $mainDb
    ) : \MainInterfaces\SingleTonImplement
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
            if (current($this->_db)->{$from} == $needle) {
                $this->_find->{key($this->_db)} = current($this->_db);

                return true;
            }
        } while (false !== next($this->_db));

        return false;
    }

    public function isInDb(string $from) : bool
    {
        $this->setCurrentDb();

        return isset(current($this->_db)->{$from});
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

    public function isInDatas(string $from) : bool
    {
        $dataConf = Datas::getConf($this->_mainDb->getDbName(), 'balises');

        if (!in_array($from, $dataConf)) return false;

        return true;
    }

    public function searchInDatas(string $from, string $needle) : bool
    {
        $this->setCurrentDb();

        $content = Datas::getsectioncontent(
            $from, current($this->_db)->{'file'}
        );

        if (empty($content)) return false;

        if ($needle === $content) {
            $this->_find->{key($this->_db)} = current($this->_db);

            return true;
        }
        else {
            if (!$this->_mainDb->nextNode()) return false;

            return $this->searchInDatas($from, $needle);
        }


        return false;
    }

    public function getKeyCurrent() : string
    {
        return key($this->_find);
    }

    public function getCurrent() : \stdClass
    {
        return current($this->_find);
    }

    public function getFind() : \stdClass
    {
        return $this->_find;
    }
}
