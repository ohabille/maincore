<?php

namespace CoreImplements;

interface SingleTonImplement
{
    /**
     * Retourne l'instance unique de la classe
     * @return \CoreImplements\SingleTonImplement
     */
    public static function getInst() : \CoreImplements\SingleTonImplement;
}
