<?php

namespace User;

class Test
{
    private $_dbName;
    private $_db;
    private $_select = [];

    public function __construct(string $dbName)
    {
        $this->_dbName = $dbName;
        $this->setNode();
    }

    private function setNode(string $node = 'years') : void
    {
        $this->_db = parseConf('db/'.$this->_dbName.'/'.$node);
    }

    public function getTotal() : int
    {
        $nbr = 0;

        foreach ($this->_db as $val) $nbr += $val->{'nbr'};

        return $nbr;
    }

    public function getSomeEntries(int $limit, int $step = 1) : void
    {
        $this->selectYears($limit, $step);
    }

    private function selectYears(int $limit, int $step) : void
    {
        $start = self::getStart($limit, $step);
        $end = self::getEnd($start, $limit);
        $nbr = 0;

        if (current($this->_db)->{'nbr'} < $start) {
            dump(key($this->_db));
            if (false !== next($this->_db)) {
                $this->selectYears($limit, $step);
            }
        }

        if ($nbr <= $limit && self::isCurrent($this->_db)) {
            $this->_select[] = key($this->_db);

            $limit -= current($this->_db)->{'nbr'};

            echo 'write';
            if (false !== next($this->_db)) {
                dump(key($this->_db));
                $this->selectYears($limit, $step);
            }
        }
    }

    private static function getStart(int $limit, int $step) : int
    {
        return $limit * ($step - 1) + 1;
    }

    private static function getEnd(int $start, int $limit) : int
    {
        return $start + $limit;
    }

    private static function isCurrent(\stdClass $objet) : bool
    {
        return false === current($objet) ? false : true;
    }

    public function getSelect() : array
    {
        return $this->_select;
    }
  }
