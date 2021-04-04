<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns;

class CommandFor
implements  \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    protected static $instance;

    public static function getCmdResult(
        \stdClass $data,
        string $match,
        string $dataName
    )
    {
        $i = 0;
        $rpl = '';

        do {
            if (Patterns::getInstance()->isPattern('for=', $match)) {
                $rpl .=
                    str_replace('{? for= ?}',
                    $data->{$dataName}[$i],
                    $match
                );
            }

            if (Patterns::getInstance()->isPattern('forData', $rpl)) {
                $rpl = str_replace(
                    '{? forData ?}',
                    $data->{$dataName.$data->{$dataName}[$i]},
                    $rpl
                );
            }

            $i++;
        } while ($i < count($data->{$dataName}));

        return $rpl;
    }
}
