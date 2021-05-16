<?php

namespace DomainTraits;

trait DbMethods
{
    /**
     * Inititialise la base de données secondaires
     */
    public function setNode() : void
    {
        $this->_db->setNode();
    }

    /**
     * @return int : Le nombre total de publications
     */
    public function getTotal() : int
    {
        return $this->_db->getTotal();
    }

    /**
     * [getDbName description]
     * @return string : Le nom de la base de données
     */
    public function getDbName() : string
    {
        return $this->_db->getDbName();
    }

    /**
     * @return string : Le nom du noeud courant principal
     */
    public function getKeyMainNode() : string
    {
        return $this->_db->getKeyMainNode();
    }

    /**
     * @return int : Le nombre de publications dans le noeud courant
     */
    public function getNbrNode() : int
    {
        return $this->_db->getNbrNode();
    }

    /**
     * @return string : Le nom du noeud courant
     */
    public function getKeyNode() : string
    {
        return $this->_db->getKeyNode();
    }

    /**
     * @return bool true or false
     */
    public function nextNode() : bool
    {
        return $this->_db->nextNode();
    }
}
