<?php

namespace Connectors;

use \GrendelTpl\GrendelSkeleton as Skeleton;

class ViewConnector
{
    public static function getInst(
        string $templateName,
        array $datas
    ) : \DomainImplements\Skeleton\ModelSkeletonImplement
    {
        return new Skeleton($templateName, $datas);
    }
}
