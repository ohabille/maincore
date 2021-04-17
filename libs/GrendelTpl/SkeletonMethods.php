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

        $file = getMainDir().$conf->{'dir'}.$fileName.$conf->{'ext'};

    	return (file_exists($file) ? file_get_contents($file): '');
    }
}
