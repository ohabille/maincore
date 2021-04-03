<?php

namespace GrendelTpl;

class SkeletonPatterns implements \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    private static $instance;
    private $_patterns;

    private function __construct()
    {
        $this->_patterns = getConf('skeleton');
    }

    /**
     * Retourne la pattern avec les délimiteurs
     * @param  string $pattern  : Le pattern
     * @param  string $opt      : Les options de recherche PCRE
     * @return string           : Le pattern délimité
     */
    private function makePattern(string $pattern, string $opt = '') : string
    {
        return '#'.$this->_patterns->{$pattern}.'#'.$opt;
    }

    /**
     * Vérifie si le template dépends d'un autre template
     * @param  string  $content : Le contenu du template
     * @return boolean
     */
    public function findPattern(string $pattern, string $content)
    {
    	return (
            0 < preg_match($this->makePattern($pattern), $content) ?
            true: false
        );
    }

    public function getPatterns() : \stdClass
    {
        return $this->_patterns;
    }
}
