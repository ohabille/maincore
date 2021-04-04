<?php

namespace MainPorts\Skeleton;

interface SkeletonImplement
{
    /**
     * @param string $view : Template
     */
    public function setView(string $view) : void;

    /**
     * @return string $_view : Template
     */
    public function getView() : string;
}
