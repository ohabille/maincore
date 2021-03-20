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

    public function getSomeEntries(int $limit, int $step = 1) : void
    {
        $start = self::getStart($limit, $step);
        $this->selectYears($start, self::getEnd($start, $limit));
    }

    private static function getStart(int $limit, int $step) : int
    {
        return $limit * ($step - 1) + 1;
    }

    private static function getEnd(int $start, int $limit) : int
    {
        return $start + $limit;
    }

    private function selectYears(int $start, int $end) : void
    {
        $nbr = count(get_object_vars($this->_select));
        $limit = $end - $start;

        $nbrEntries = current($this->_node)->{'nbr'};

        if ($nbrEntries < $start) {
            // echo '<br />'.$start.' to '.$end;
            $start -= $nbrEntries;
            $end -= $nbrEntries;
        }
        else {
            // echo '<br />'.$start.' to '.$end.' : '
            // .key($this->_mainNode).'-'.key($this->_node);

            $db = parseConf(
                'db/'.$this->_dbName.'/'
                .key($this->_mainNode).'-'
                .key($this->_node)
            );

            $first = $start - 1;
            $nbrEntries = count(get_object_vars($db));
            $length = $nbrEntries < $end ?
                $end - ($end - $nbrEntries) - $first: $end;
            dump(array_slice(
                get_object_vars($db), $start - 1, $length, true
            ));
        }

        $this->setNext();

        if (false !== current($this->_mainNode))
            $this->selectYears($start, $end);
    }

    private function setNext() : void
    {
        if (false === next($this->_node)) {
            if (false !== next($this->_mainNode))
                $this->setNode();
        }
    }

    public function getSelect() : \stdClass
    {
        return $this->_select;
    }
  }
