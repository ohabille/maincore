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
        if (is_null(self::$class))
            self::$class = get_called_class();

        if (is_null(self::$instance)) {
            self::$instance = call_user_func_array(
                [self::$class, 'setInstance'],
                func_get_args()
            );
        }

        return self::$instance;
    }

    /**
     * Retourne l'instance de la classe
     * @return \MainPorts\SingleTonImplement : instance de la classe
     */
    public static function setInstance() : \MainPorts\SingleTonImplement
    {
        if (0 < func_num_args()) {
            return call_user_func_array(
                [self::$class, 'constructClass'],
                func_get_args()
            );
        }

        return new self::$class;
    }

    public static function constructClass() {}
}
