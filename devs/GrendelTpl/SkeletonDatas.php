<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns;

class SkeletonDatas
{
    private $_skeleton;
    private $_controller;

    public function __construct(
        \MainPorts\Controllers\DatasImplements $controller,
        \MainPorts\Skeleton\SkeletonImplement $skeleton
    )
    {
        $this->_controller = $controller;
        $this->_skeleton = $skeleton;

        $this->findCommands();

        $this->findDatas();
    }

    private function findCommands()
    {
        if (Patterns::getInstance()
            ->isPattern('cmdsList', $this->_skeleton->getView())
        ) {
            $this->applyCommands(
                Patterns::getInstance()
                    ->findAllPatterns('cmdsList', $this->_skeleton->getView())
            );
        }
    }

    private function applyCommands(array $cmds)
    {
        foreach ($cmds[1] as $k=>$cmd) {
            $task = '\GrendelTpl\Command'.ucfirst($cmd);

            preg_match(
                Patterns::getInstance()->getContentPattern(
                    $cmd, $cmds[3][$k]
                ),
                $this->_skeleton->getView(),
                $match
            );

            $this->_skeleton->setView(
                str_replace(
                    $match[0],
                    $task::getInstance()::getCmdResult(
                        $this->_controller->getDatas(),
                        $match[1],
                        $cmds[3][$k]
                    ),
                    $this->_skeleton->getView()
                )
            );
        }
    }

    private function findDatas()
    {
        if (Patterns::getInstance()
            ->isPattern('datas', $this->_skeleton->getView())
        ) {
            $this->getDatas(Patterns::getInstance()
                ->findAllPatterns(
                    'datas',
                    $this->_skeleton->getView()
                )
            );
        }
    }

    private function getDatas(array $findDatas)
    {
        foreach ($findDatas[1] as $k=>$data) {
            $this->_skeleton->setView(
                str_replace(
                    $findDatas[0][$k],
                    isset($this->_controller->getDatas()->{$data}) ?
                        $this->_controller->getDatas()->{$data}:
                        $data,
                    $this->_skeleton->getView()
                )
            );
        }
    }
}
