<?php

namespace MainInterfaces;

interface SingleTonImplement
{
    /**
     * Retourne l'instance unique de la classe
     * @return \MainInterfaces\SingleTonImplement
     */
    public static function getInstance() : \MainInterfaces\SingleTonImplement;
}
