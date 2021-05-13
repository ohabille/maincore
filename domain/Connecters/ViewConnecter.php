<?php

namespace Connecters;

use \GrendelTpl\GrendelSkeleton as Skeleton;

class ViewConnecter
{
    public static function getInst(
        string $templateName,
        array $datas
    ) : \DomainImplements\Skeleton\ModelSkeletonImplement
    {
        return new Skeleton($templateName, $datas);
    }
}
