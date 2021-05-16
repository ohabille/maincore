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
        if (is_null(self::$instance)) self::$instance = new self::$class;

        return self::$instance;
    }
}
