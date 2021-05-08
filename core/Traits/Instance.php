<?php

namespace MainTraits;

trait Instance
{
    /**
     * Le nom de la classe à instancier
     * @var string
     */
    private static $class;

    /**
    * Retourne une instance unique de la classe appelée
    * @return object : L'instance de la classe
    */
    public static function getInst() : \MainInterfaces\SingleTonImplement
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
     * @return \MainInterfaces\SingleTonImplement : instance de la classe
     */
    private static function setInstance() : \MainInterfaces\SingleTonImplement
    {
        return new self::$class;
    }
}
