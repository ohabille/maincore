<?php

namespace Connectors;

use \GrendelTpl\GrendelSkeleton as Skeleton;

class ViewConnector
{
    public static function getInstance(
        string $templateName,
        \stdClass $datas
    ) : \DomainInterfaces\Skeleton\ModelSkeletonImplement
    {
        return new Skeleton($templateName, $datas);
    }
}