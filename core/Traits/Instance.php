<?php

namespace MainTraits;

trait Instance
{
    private static $class;

    /**
    * Retourne une instance unique de la classe appelée
    * @return object : L'instance de la classe
    */
    public static function getInstance() : \MainPorts\SingleTonImplement
    {
        if (is_null(self::$instance)) {
            self::$class = get_called_class();
            self::$instance = call_user_func_array(
                [self::$class, 'setInstance'],
                func_get_args()
            );
        }

        return self::$instance;
    }

    /**
     * Retourne l'instance de la classe
     * @return MainPortsSingleTonImplement : instance de la classe
     */
    public static function setInstance() : \MainPorts\SingleTonImplement
    {
        return new self::$class;
    }
}
