<?php

namespace DomainTraits;

trait ConnectersInstance
{
    /**
    * Retourne une instance unique de la classe appelée
    * @return $instance : L'instance de la classe
    */
    public static function getInst()
    {
        self::setInst();

        return self::$instance;
    }
}
