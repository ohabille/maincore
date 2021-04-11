<?php

namespace GrendelTpl;

use \GrendelTpl\SkeletonPatterns as Patterns;

class SkeletonBlocks
{
    private $_blocks;
    private $_content;

    public function __construct(string $view)
    {
        $this->_blocks = Patterns::getInstance()->findAllPatterns('block', $view);
    }

    public function findBlock(string $name, string $view) : array
    {
        $matches = $this->findBlockContent($name, $view);

        $this->_content = $matches[1];

        return $matches[0];
    }

    public function findBlockContent(string $name, $view) : array
    {
        return 0 < preg_match_all(
            $this->getBlockPattern($name),
            $view,
            $matches
        ) ? $matches: [];
    }

    private function getBlockPattern(string $blockName) : string
    {
        $pattern = $this->getUniqueBlockPattern($blockName)
            .Patterns::getInstance()->getPattern('content')
            .Patterns::getInstance()->getPattern('endBlock');

        return Patterns::getInstance()->makePattern(
            $pattern,
            Patterns::getInstance()->getPattern('optContent')
        );
    }

    private function getUniqueBlockPattern(string $blockName) : string
    {
        return Patterns::getInstance()->getUniquePattern(
            '([A-Z]+)', $blockName, 'block'
        );
    }

    public function isBlocks() {
        return empty($this->_blocks) ? false: true;
    }

    public function getBlocksNames() : array
    {
        return $this->_blocks[1];
    }

    public function getContent() : string
    {
        return $this->_content[0];
    }
}
