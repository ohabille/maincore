<?php

namespace GrendelDb;

class Select implements \MainInterfaces\DatasBases\DbSelectImplement
{
    private $_mainDb;
    private $_db;
    private $_select;

    public function __construct(
        \MainInterfaces\DatasBases\DbImplement $mainDb,
        \MainInterfaces\PagerImplement $pager
    )
    {
        $this->_mainDb = $mainDb;

        $this->_select = new \stdClass();
        $this->selectSomesEntries($pager);
    }

    private function selectSomesEntries(
        \MainInterfaces\PagerImplement $pager
    ) : void
    {
        $start = $this->selectDb($pager->getStart());

        if ($start > 0) $this->selectEntries($start, $pager->getLimit());
    }

    private function selectDb(int $start) : int
    {
        $nbr = $this->_mainDb->getNbrNode();

        if ($nbr < $start) {
            $start -= $nbr;
            if ($this->_mainDb->nextNode())
                return $this->selectDb($start);
            else return 0;
        }

        return $start;
    }

    private function selectEntries(int $start, int $limit) : bool
    {
        $this->setCurrentDb();

        $this->goToStart($start);

        $nbr = getNbrOf($this->_select);

        $end = $limit - $nbr;

        for ($i = 0; $i < $end; $i++) {
            $this->_select->{key($this->_db)} = current($this->_db);

            if (false === next($this->_db) || $i === $limit) break;
        }

        if ($start > 1) $start--;

        if ($nbr < $limit) {
            if (!$this->_mainDb->nextNode()) return false;

            return $this->selectEntries($start, $limit);
        }

        return true;
    }

    private function setCurrentDB() : void
    {
        $this->_db = parseConf(__DIR__.'/db/'
            .$this->_mainDb->getDbName().'/'
            .$this->_mainDb->getKeyMainNode().'-'
            .$this->_mainDb->getKeyNode()
        );
    }

    private function goToStart(int $start) : void
    {
        for ($i = 1; $i < $start; $i++)
            if (false === next($this->_db)) break;
    }

    public function getSelect() : \stdClass
    {
        return $this->_select;
    }
}
