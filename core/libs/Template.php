<?php

namespace MainLib;

class Template
implements  \MainPorts\FuncsImplement,
            \MainPorts\SingleTonImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    protected static $instance;
    private static $conf;

    /**
     * Retourne l'instance de la classe
     * @return \MainPorts\SingleTonImplement : instance de la classe
     */
    public static function setInstance() : \MainPorts\SingleTonImplement
    {
        self::$conf = getConf('skeleton')->{'template'};

        return new self::$class;
    }

    public function getTemplate(string $fileName) : string
    {
        $file = ROOTDIRS.self::$conf->{'dir'}
            .$fileName.
            self::$conf->{'ext'};

    	return (file_exists($file) ? file_get_contents($file): '');
    }
}
