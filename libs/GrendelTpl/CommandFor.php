<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns;

class CommandFor
implements  \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * instance de la classe
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    public static function getCmdResult(
        array $data,
        string $match,
        string $dataName
    )
    {
        $i = 0;
        $rpl = '';

        do {
            $rpl .= Patterns::getInstance()->isPattern('for=', $match) ?
                str_replace('{? for= ?}', $data[$dataName][$i], $match):
                $match;

            if (Patterns::getInstance()->isPattern('forData', $rpl)) {
                $rpl = str_replace(
                    '{? forData ?}',
                    $data[$dataName.$data[$dataName][$i]],
                    $rpl
                );
            }

            if (Patterns::getInstance()->isPattern('dataName', $rpl)) {
                $rpl = self::replaceDataName(
                    Patterns::getInstance()
                    ->findAllPatterns('dataName', $rpl)[1],
                    $data[$data[$dataName][$i]],
                    $rpl
                );
            }

            $i++;
        } while ($i < count($data[$dataName]));

        return $rpl;
    }

    private static function replaceDataName(
        array $matches, array $data, string $str
    ) : string
    {
        foreach ($matches as $match) {
            if (!isset($data[$match])) continue;

            $str = str_replace(
                '{? dataName '.$match.' ?}',
                $data[$match],
                $str
            );
        }

        return $str;
    }
}
