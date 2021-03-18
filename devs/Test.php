<?php

namespace User;

class Test
{
    private $_dbName;
    private $_db;
    private $_mounth;

    public function __construct(string $dbName)
    {
        $this->_dbName = $dbName;
        $this->_db = $this->getNode();
    }

    public function getTotal() : int
    {
        $nbr = 0;

        foreach ($this->_db as $val) $nbr += $val->{'nbr'};

        return $nbr;
    }

    public function getSomeEntries(int $limit, int $step = 1) : array
    {
        $nbr = 0;
        $entries = [];

        dump($this->selectYears($limit, $step));

        return $entries;
    }

    private function selectYears(int $limit, int $step) : array
    {
        $start = self::getStart($limit, $step);
        $end = self::getEnd($start, $limit);
        $nbr = 0;
        $years = [];

        foreach ($this->_db as $k=>$val) {
            $nbr += $val->{'nbr'};

            if ($nbr < $start) continue;

            $years[] = $k;
            dump($this->_db->{$k}->{'mounths'});

            if ($nbr >= $end) break;
        }

        return $years;
    }

    private static function getStart(int $limit, int $step) : int
    {
        return $limit * ($step - 1) + 1;
    }

    private static function getEnd(int $start, int $limit) : int
    {
        return $start + $limit;
    }

    private function getNode(string $node = 'years') : \stdClass
    {
        return parseConf('db/'.$this->_dbName.'/'.$node);
    }
  }
