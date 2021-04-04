<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns,
    \GrendelTpl\SkeletonBlocks as Blocks;

class Skeleton implements \MainPorts\Skeleton\SkeletonImplement
{
    private $_view;

    public function __construct(string $name)
    {
        $this->_view = $this->findSkeleton(getTemplate($name));
    }

    private function findSkeleton(string $content) : string
    {
        if (!Patterns::getInstance()->isPattern('skeleton', $content))
            return $content;

        return $this->getSkeleton(
            Patterns::getInstance()->findPattern('skeleton', $content)[1],
            $content
        );
    }

    private function getSkeleton(string $name, string $content) : string
    {
        $skeleton = $this->findSkeleton(getTemplate($name));

        $blocks = new Blocks($skeleton);

        if (!$blocks->isBlocks()) return $skeleton;

        foreach ($blocks->getBlocksNames() as $k=>$block) {
            $dtc = $blocks->findBlockContent($block, $content);

            $skeleton = str_replace(
                $blocks->findBlock($block),
                empty($dtc) ? $blocks->getContent(): $dtc[1],
                $skeleton
            );
        }

        return $skeleton;
    }

    public function setView(string $view) : void
    {
        $this->_view = $view;
    }

    public function getView() : string
    {
        return $this->_view;
    }
  }
