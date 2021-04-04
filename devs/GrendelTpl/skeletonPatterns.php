<?php

namespace GrendelTpl;

class SkeletonPatterns implements \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    private static $instance;
    private $_patterns;
    private $_commands;

    private function __construct()
    {
        $this->_patterns = getConf('skeleton')->{'patterns'};
        $this->_commands = getConf('skeleton')->{'commands'};
    }

    public function getUniquePattern(
        string $masq, string $masqName, string $pattName
    ) : string
    {
        return str_replace(
            $masq,
            $masqName,
            $this->_patterns->{$pattName}
        );
    }

    public function getContentPattern(string $cmd, string $name) : string
    {
        return $this->makePattern(
            $this->getUniquePattern(
                '([a-zA-Z]+)', $name, $cmd
            )
            .$this->getPattern('content')
            .$this->getPattern('end'.ucfirst($cmd))
        );
    }

    /**
     * Retourne la pattern avec les délimiteurs
     * @param  string $pattern  : Le pattern
     * @param  string $opt      : Les options de recherche PCRE
     * @return string           : Le pattern délimité
     */
    public function makePattern(string $pattern, string $opt = '') : string
    {
        return '#'.$pattern.'#'.$opt;
    }

    /**
     * Vérifie un pattern
     * @param  string  $content : Le contenu du template
     * @return boolean
     */
    public function isPattern(string $pattern, string $content) : bool
    {
    	return 0 < preg_match(
            $this->makePattern($this->_patterns->{$pattern}),
            $content
        ) ? true: false;
    }

    public function findPattern(string $pattern, string $content) : array
    {
        return 0 < preg_match(
            $this->makePattern($this->_patterns->{$pattern}),
            $content,
            $matches
        ) ? $matches: [];
    }

    public function findAllPatterns(string $pattern, string $content) : array
    {
        return 0 < preg_match_all(
            $this->makePattern($this->_patterns->{$pattern}),
            $content,
            $matches
        ) ? $matches: [];
    }

    public function getPatterns() : \stdClass
    {
        return $this->_patterns;
    }

    public function getPattern(string $pattName) : string
    {
        return $this->_patterns->{$pattName};
    }
}
