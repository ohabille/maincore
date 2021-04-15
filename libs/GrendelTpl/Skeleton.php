<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns,
    \GrendelTpl\SkeletonBlocks as Blocks;

class Skeleton implements \DomainInterfaces\Skeleton\SkeletonImplement
{
    private $_skeleton;

    public function __construct(string $name)
    {
        $this->_skeleton = $this->findSkeleton(getTemplate($name));
    }

    private function findSkeleton(string $content) : string
    {
        if (!Patterns::getInstance()->isPattern('skeleton', $content))
            return $content;

        return $this->writeSkeleton(
            Patterns::getInstance()->findPattern('skeleton', $content)[1],
            $content
        );
    }

    private function writeSkeleton(string $name, string $content) : string
    {
        $skeleton = $this->findSkeleton(getTemplate($name));

        $blocks = new Blocks($skeleton);

        if (!$blocks->isBlocks()) return $skeleton;

        foreach ($blocks->getBlocksNames() as $k=>$block) {
            $dtc = $blocks->findBlockContent($block, $content);

            $skeleton = str_replace(
                $blocks->findBlock($block, $skeleton),
                empty($dtc) ? $blocks->getContent(): $dtc[1],
                $skeleton
            );
        }

        return $skeleton;
    }

    public function setSkeleton(string $skeleton) : void
    {
        $this->_skeleton = $skeleton;
    }

    public function getSkeleton() : string
    {
        return $this->_skeleton;
    }
  }
