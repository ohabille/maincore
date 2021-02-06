<?php

namespace MainPorts;

interface SingleTonImplement
{
    /**
     * Retourne l'instance unique de la classe
     * @return \MainPorts\SingleTonImplement
     */
    public static function getInstance() : \MainPorts\SingleTonImplement;
}
