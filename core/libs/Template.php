<?php

namespace MainLib;

class Template
implements  \MainInterfaces\FuncsImplement,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainInterfaces\SingleTonImplement
     */
    protected static $instance;
    private static $conf;

    /**
     * Retourne l'instance de la classe
     * @return \MainInterfaces\SingleTonImplement : instance de la classe
     */
    public static function setInstance() : \MainInterfaces\SingleTonImplement
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
