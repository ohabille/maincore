<?php

namespace GrendelDb;

use \MainLib\Datas;

class Search
// implements \MainPorts\DatasBases\DbSelectImplement
{
    private $_mainDb;
    private $_db;
    private $_dataMethods;
    private $_find;

    public function __construct(
        \MainPorts\DatasBases\DbImplement $mainDb
    )
    {
        $this->_mainDb = $mainDb;

        $this->_find = new \stdClass();
    }

    public function isInDb(string $from)
    {
        $this->setCurrentDb();

        return isset(current($this->_db)->{$from});
    }

    public function searchInDb(string $from, string $needle) : bool
    {
        $this->setCurrentDb();

        if (isset(current($this->_db)->{$from})) {
            $test = current($this->_db)->{$from};

            if ($test === $needle) {
                $this->_find->{key($this->_db)} = current($this->_db);

                return true;
            }
            else {
                if (!$this->_mainDb->nextNode()) return false;

                return $this->searchInDb($from, $needle);
            }
        }

        $this->_mainDb->resetNode();

        return false;
    }

    public function isInDatas(string $from) : bool
    {
        $this->_dataMethods = new Datas();

        $this->_dataMethods->setConf($this->_mainDb->getDbName());

        if (!in_array($from, $this->_dataMethods->getConf()->{'balises'}))
            return false;

        return true;
    }

    public function searchInDatas(string $from, string $needle) : bool
    {
        $this->setCurrentDb();

        $content = $this->_dataMethods->getsectioncontent(
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

    private function setCurrentDB() : void
    {
        $this->_db = parseConf(
            'db/'.$this->_mainDb->getDbName().'/'
            .$this->_mainDb->getKeyMainNode().'-'
            .$this->_mainDb->getKeyNode()
        );
    }

    public function getFind() : \stdClass
    {
        return $this->_find;
    }
}
