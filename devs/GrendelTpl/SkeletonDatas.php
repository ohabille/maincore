<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns;

class SkeletonDatas implements \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    protected static $instance;

    private static function findDatas(string $view)
    {
        if (!Patterns::getInstance()
            ->isPattern('datas', $view)
        ) return [];

        return Patterns::getInstance()
            ->findAllPatterns('datas', $view);
    }

    public static function setDatas(\stdClass $datas, string $view)
    {
        $findDatas = self::findDatas($view);

        foreach ($findDatas[1] as $k=>$data) {
            $rpl = isset($datas->{$data}) ? $datas->{$data}: $data;

            if (!empty($findDatas[3][$k]))
                $rpl = isset($rpl->{$findDatas[3][$k]}) ?
                    $rpl->{$findDatas[3][$k]}:
                    $findDatas[3][$k];

            $view = str_replace(
                $findDatas[0][$k],
                $rpl,
                $view
            );
        }

        return $view;
    }
}
