<?php

namespace GrendelTpl;

use \GrendelTpl\Skeleton,
    \GrendelTpl\SkeletonDatas as Datas,
    \GrendelTpl\SkeletonPatterns as Patterns;

class GrendelSkeleton
{
    private $_view;
    private $_skeleton;
    private $_datas;

    public function __construct(
        string $templateName,
        \MainInterfaces\Controllers\DatasImplements $datas
    )
    {
        $this->_skeleton = new Skeleton($templateName);
        $this->_datas = $datas;

        $commands = $this->findCommands();

        if (!empty($commands)) $this->applyCommands($commands);

        $this->_skeleton->setSkeleton(
            Datas::getInstance()::setDatas(
                $this->_datas->getDatas(),
                $this->_skeleton->getSkeleton()
            )
        );
    }

    private function findCommands()
    {
        if (!Patterns::getInstance()
            ->isPattern('cmdsList', $this->_skeleton->getSkeleton())
        ) return [];

        return Patterns::getInstance()
            ->findAllPatterns('cmdsList', $this->_skeleton->getSkeleton());
    }

    private function applyCommands(array $cmds)
    {
        foreach ($cmds[1] as $k=>$cmd) {
            $task = '\GrendelTpl\Command'.ucfirst($cmd);

            preg_match(
                Patterns::getInstance()->getContentPattern(
                    $cmd, $cmds[3][$k]
                ),
                $this->_skeleton->getSkeleton(),
                $match
            );

            $this->_skeleton->setSkeleton(
                str_replace(
                    $match[0],
                    $task::getInstance()::getCmdResult(
                        $this->_datas->getDatas(),
                        $match[1],
                        $cmds[3][$k]
                    ),
                    $this->_skeleton->getSkeleton()
                )
            );
        }
    }

    public function setSkeleton(string $view) : void
    {
        $this->_view = $view;
    }

    public function readTemplate()
    {
        echo $this->_skeleton->getSkeleton();
    }
}
