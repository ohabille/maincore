<?php

namespace GrendelTpl;

class SkeletonMethods
implements  \MainInterfaces\FuncsImplement,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainInterfaces\SingleTonImplement
     */
    protected static $instance;

    public function getTemplate(string $fileName) : string
    {
        $conf = parseConf(__DIR__.'/jsons/skeleton')->{'template'};

        $file = self::getMainDir().$conf->{'dir'}.$fileName.$conf->{'ext'};

    	return (file_exists($file) ? file_get_contents($file): '');
    }

    private static function getMainDir() : string
    {
        $mainApp = explode('/', getcwd());
        $actualApp = explode('/', __DIR__);

        $diff = array_diff($actualApp, $mainApp);

        $key = array_search(array_shift($diff), $actualApp) - count($actualApp);

        return implode('/', array_slice($actualApp, 0, $key)).'/';
    }
}
