<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns;

class SkeletonDatas implements \CoreInterface\SingleTonImplement
{
    use \CoreTraits\Instance;

    /**
     * instance de la classe
     * @var \CoreInterface\SingleTonImplement
     */
    private static $instance;

    private static function findDatas(string $view)
    {
        if (!Patterns::getInst()
            ->isPattern('datas', $view)
        ) return [];

        return Patterns::getInst()
            ->findAllPatterns('datas', $view);
    }

    public static function setDatas(array $datas, string $view)
    {
        $findDatas = self::findDatas($view);

        foreach ($findDatas[1] as $k=>$data) {
            $rpl = isset($datas[$data]) ? $datas[$data]: $data;

            if (!empty($findDatas[3][$k]))
                $rpl = isset($rpl[$findDatas[3][$k]]) ?
                    $rpl[$findDatas[3][$k]]:
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
