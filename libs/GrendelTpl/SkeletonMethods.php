<?php

namespace GrendelTpl;

class SkeletonMethods
implements  \CoreInterface\FuncsImplement,
            \CoreInterface\SingleTonImplement
{
    use \CoreTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \CoreInterface\SingleTonImplement
     */
    private static $instance;

    public function getTemplate(string $fileName) : string
    {
        $conf = parseConf(__DIR__.'/jsons/skeleton')['template'];

        $file = getMainDir().$conf['dir'].$fileName.$conf['ext'];

    	return (file_exists($file) ? file_get_contents($file): '');
    }
}
