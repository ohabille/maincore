<?php

namespace Core\CoreFunctions;

class CoreFunctions
{
    public static function setCoreFunctions() : void
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
