<?php

namespace User;

class Test implements \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * Instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;

    private function __construct(string $prout)
    {
        dump($prout);
    }

    /**
     * Retourne l'instance de la classe
     * @return MainPortsSingleTonImplement : instance de la classe
     */
    public static function setInstance(string $prout = "")
    : \MainPorts\SingleTonImplement
    {
        return new Test($prout);
    }
}
