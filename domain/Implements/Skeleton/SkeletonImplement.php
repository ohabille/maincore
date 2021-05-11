<?php

namespace DomainImplements\Skeleton;

interface SkeletonImplement
{
    /**
     * @param string $view : Template
     */
    public function setSkeleton(string $view) : void;

    /**
     * @return string $_view : Template
     */
    public function getSkeleton() : string;
}
