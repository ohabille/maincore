<?php

namespace User;

class Test
{
    private $_dbName;
    private $_mainNode;
    private $_node;
    private $_db;
    private $_select;

    public function __construct(string $dbName)
    {
        $this->_dbName = $dbName;

        $this->_mainNode = parseConf('db/'.$this->_dbName.'/years');

        $this->setNode();

        $this->_select = new \stdClass();
    }

    private function setNode() : void
    {
        $this->_node = current($this->_mainNode)->{'mounths'};
    }

    public function getTotal() : int
    {
        $nbr = 0;

        foreach ($this->_mainNode as $val) $nbr += $val->{'nbr'};

        return $nbr;
    }

    public function selectSomesEntries(int $limit, int $step = 1) : void
    {
        $start = $this->selectDb($this->getStart($limit, $step));

        if ($start > 0) $this->selectEntries($start, $limit);
    }

    private function getStart(int $limit, int $step) : int
    {
        return 1 + ($limit * $step) - $limit;
    }

    private function selectDb(int $start) : int
    {
        $nbr = current($this->_mainNode)->{'nbr'};

        if ($nbr < $start) {
            $start -= $nbr;
            if (false !== next($this->_mainNode)) {
                $this->setNode();
                return $this->selectDb($start);
            }
            else return 0;
        }

        $nbr = current($this->_node)->{'nbr'};

        if ($nbr < $start) {
            $start -= $nbr;
            if (false !== next($this->_node))
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
            if (false === next($this->_node)) {
                if (false !== next($this->_mainNode)) $this->setNode();
                else return false;
            }

            return $this->selectEntries($start, $limit);
        }

        return true;
    }

    private function setCurrentDB() : void
    {
        $this->_db = parseConf(
            'db/'.$this->_dbName.'/'
            .key($this->_mainNode).'-'
            .key($this->_node)
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
