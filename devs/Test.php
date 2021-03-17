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
        $this->_db = $this->getDb();
    }

    public function getTotal() : int
    {
        return array_sum(array_values($this->_db));
    }

    public function getSomeEntries(int $limit, int $step = 1) : array
    {
        $nbr = 0;
        $entries = [];

        dump($this->filterMounths($limit, $step));

        return $entries;
    }

    private function filterMounths(int $limit, int $step) : array
    {
        $start = $limit * ($step - 1) + 1;
        $end = $start + $limit;
        $nbr = 0;
        $mounths = [];

        foreach ($this->_db as $k=>$val) {
            $nbr += $val;

            if ($nbr < $start) continue;

            $mounths[] = $k;

            if ($nbr > $end) break;
        }

        return $mounths;
    }

    private function getDb(string $node = 'years') : array
    {
        return stdToArray(parseConf('db/'.$this->_dbName.'/'.$node));;
    }
  }
