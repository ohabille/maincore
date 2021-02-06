<?php

namespace MainLib;

class ArrayConverter
implements \MainPorts\FuncsImplement,
            \MainPorts\SingleTonImplement
{
    use \MainTraits\MainFuncs;

    /**
     * Instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    protected static $instance;

    /**
     * Retourne un object stdClass convertit en array
     * @var    stdClass $std : L'object srdClass
     * @return array         : un array
     */
    public function stdToArray(\stdClass $std) : array
    {
        return self::readStd($std);
    }

    /**
     * Lit un object stdClass et le convertir en array
     * @var    stdClass/array : un object stdClass ou un array
     * @return array          : un array
     */
    private static function readStd($std) : array
    {
        $conf = [];
        while (false !== current($std)) {
            $conf[key($std)] = self::getCurrent($std);
            next($std);
        }

        return $conf;
    }

    /**
     * Retourne la valeur de l'entrée courante
     * @var    stdClass/array $std : l'objet stdClass ou un array
     * @return                     : la valeur courante
     */
    private static function getCurrent($std)
    {
        $current = current($std);

        return self::isReadable($current) ? self::readStd($current): $current;
    }

    /**
     * Vérifie si la variable transmise est un object stdClass ou un array
     * @var    stdClass/array $std : l'objet stdClass ou un array
     * @return bool
     */
    private static function isReadable($std) : bool
    {
        return is_a($std, '\stdClass') || is_array($std) ? true: false;
    }
}
