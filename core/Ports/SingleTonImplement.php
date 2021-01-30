<?php

namespace MainPorts;

interface SingleTonImplement
{
    /**
     * Retourne l'instance unique de la classe
     * @return object
     */
    public static function getInstance() : \MainPorts\SingleTonImplement;

    /**
     * Initialise l'instance de la classe
     */
    public static function setInstance() : \MainPorts\SingleTonImplement;
}
