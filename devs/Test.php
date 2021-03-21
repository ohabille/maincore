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
        dump('step : '.$step.', limit : '.$limit);
        $start = $this->selectDb($this->getStart($limit, $step));

        if ($start > 0) {
            $this->selectEntries($start, $limit + $start);
        }
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
        dump('start : '.$start.', limit : '.$limit);
        dump(key($this->_mainNode).'-'.key($this->_node));
        $db = parseConf(
            'db/'.$this->_dbName.'/'
            .key($this->_mainNode).'-'
            .key($this->_node)
        );

        $nbr = getNbrOf($db);
        dump($nbr - $start -1);
        $end = $nbr > $limit ?
            abs($limit - $nbr):
            ;

        // for ($i = 1; $i <= $nbr; $i++) {
        //     if ($start > $i) {
        //         if (false === next($db)) break;
        //         else continue;
        //     }
        //
        //     $this->_select->{key($db)} = current($db);
        //     if (false === next($db)) break;
        //
        //     if ($i + $start > $limit) break;
        // }
        //
        // $nbr = getNbrOf($this->_select);
        //
        // if ($nbr < $limit) {
        //     $limit -= $nbr;
        //     $start -= $nbr;
        //
        //     if (false === next($this->_node)) {
        //         if (false !== next($this->_mainNode))
        //             $this->setNode();
        //         else return true;
        //     }
        //
        //     return $this->selectEntries($start, $limit);
        // }
        //
        // return true;
    }

    public function getSelect() : \stdClass
    {
        return $this->_select;
    }
  }
