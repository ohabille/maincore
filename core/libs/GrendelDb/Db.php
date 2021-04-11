<?php

namespace GrendelDb;

class Db implements \MainInterfaces\DatasBases\DbImplement
{
    /**
     * Le nom de la base de données
     * @var string
     */
    private $_dbName;
    /**
     * La base de données primaire
     * @var stdClass
     */
    private $_mainNode;
    /**
     * La base de données secondaire
     * @var stdClass
     */
    private $_node;

    public function __construct(string $dbName)
    {
        $this->_dbName = $dbName;

        $this->_mainNode = parseConf('db/'.$this->_dbName.'/years');

        $this->setNode();
    }

    /**
     * Initialise la base de données secondaire
     */
    public function setNode() : void
    {
        $this->_node = current($this->_mainNode)->{'months'};
    }

    public function getTotal() : int
    {
        $nbr = 0;

        foreach ($this->_mainNode as $val) $nbr += $val->{'nbr'};

        return $nbr;
    }

    public function getDbName() : string
    {
        return $this->_dbName;
    }

    public function getKeyMainNode() : string
    {
        return key($this->_mainNode);
    }

    public function getNbrNode() : int
    {
        return current($this->_node)->{'nbr'};
    }

    public function getKeyNode() : string
    {
        return key($this->_node);
    }

    public function nextNode() : bool
    {
        if (false === next($this->_node)) {
            if (false !== next($this->_mainNode)) $this->setNode();
            else return false;
        }

        return true;
    }

    public function resetNode() : void
    {
        reset($this->_mainNode);

        $this->setNode();
    }
  }
