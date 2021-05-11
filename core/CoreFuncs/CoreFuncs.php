<?php

namespace Core\CoreFuncs;

class CoreFuncs
{
    public static function setCoreFuncs() : void
    {
        $classes = json_decode(
            file_get_contents(
                ROOTDIRS.'confs/classFuncs.json'
            ), true
        );

        foreach ($classes as $class)
            $class['namespace']::getInst()->setFunction($class['methods']);
    }
}
