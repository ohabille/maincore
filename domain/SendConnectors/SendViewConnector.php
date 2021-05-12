<?php

namespace SendConnectors;

use \GrendelTpl\GrendelSkeleton as Skeleton;

class SendViewConnector
{
    public static function getInst(
        string $templateName,
        array $datas
    ) : \DomainImplements\Skeleton\ModelSkeletonImplement
    {
        return new Skeleton($templateName, $datas);
    }
}
