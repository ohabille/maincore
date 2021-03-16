<?php

namespace User;

class Test
{
    private $_db;
    private $_mounth;

    public function __construct(string $dbName)
    {
        $this->_db = parseConf('db/'.$dbName.'/years');
    }

    public function getTotal() : int
    {
        return array_sum($this->findAllInDb('nbr'));
    }

    public function findAllInDb(string $key, string $node = '_db') : array
    {
        $return = [];

        foreach ($this->{$node} as $k=>$val)
            $return[$k] = $val->{$key};

        return $return;
    }

    public function getSomeEntries(int $limit, int $step = 1)
    {
        $start = $limit * ($step - 1) + 1;
        dump($start);
        $end = $start + $limit;
        dump($end);
        $nbr = 0;
        $mounths = [];

        foreach ($this->_db as $k=>$val) {
            $nbr += $val->{'nbr'};

            if ($nbr < $start) continue;

            foreach ($val->{'mounths'} as $mounth) {
                if ($nbr > $end) {
                    dd($nbr);
                    // $nbr -= $;
                }

                $mounths[] = $k.'-'.$mounth;
                dump($nbr);
                if ($nbr > $end) break;
            }

            if ($nbr > $end) break;
        }

        return $mounths;
    }

    private function getAllKeys(string $node = '_db')
    {
        $return = [];

        foreach ($this->{$node} as $k=>$val)
            $return[] = $k;

        return $return;
    }
  }
