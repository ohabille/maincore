<?php

namespace DomainInterfaces\Skeleton;

interface ModelSkeletonImplement
{
    /**
     * @param string $view : Template
     */
    public function setSkeleton(string $view) : void;

    /**
     * @return string $_view : Template
     */
    public function getSkeleton() : string;

    /**
     * Affiche le template
     */
    public function readTemplate() : void;
}
