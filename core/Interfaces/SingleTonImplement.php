<?php

namespace CoreInterface;

interface SingleTonImplement
{
    /**
     * Retourne l'instance unique de la classe
     * @return \CoreInterface\SingleTonImplement
     */
    public static function getInst() : \CoreInterface\SingleTonImplement;
}
