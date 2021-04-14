<?php

namespace Connectors;

use \GrendelTpl\GrendelSkeleton as Skeleton;

class ViewConnector
{
    public static function getInstance(
        string $templateName,
        \stdClass $datas
    ) : \MainInterfaces\Skeleton\ModelSkeletonImplement
    {
        return new Skeleton($templateName, $datas);
    }
}
