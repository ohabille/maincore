<?php

namespace MainPorts\DatasBases;

interface DbImplement
{
    /**
     * Inititialise la base de données secondaires
     */
    public function setNode() : void;

    /**
     * @return int : Le nombre total de publications
     */
    public function getTotal() : int;

    /**
     * [getDbName description]
     * @return string : Le nom de la base de données
     */
    public function getDbName() : string;

    /**
     * @return string : Le nom du noeud courant principal
     */
    public function getKeyMainNode() : string;

    /**
     * @return int : Le nombre de publications dans le noeud courant
     */
    public function getNbrNode() : int;

    /**
     * @return string : Le nom du noeud courant
     */
    public function getKeyNode() : string;

    /**
     * @return bool true or false
     */
    public function nextNode() : bool;
}
