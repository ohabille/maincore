<?php

namespace MainLib;

class MatchRequests implements \MainPorts\MatchRequestsImplement
{
    /**
     * @var \stdClass
     */
    private $_conf;
    /**
     * @var array
     */
    private $_matches;

    public function __construct(\MainPorts\RoutesImplement $conf)
    {
        $this->_conf = $conf->getConf();
        $this->_matches = $this->readStepsUri();
    }

    /**
     * Compare l'url au pattern des Routes
     * et retourne le résultat sous forme d'un tableau
     * @return array : Le résultat de la comparaison
     */
    private function readStepsUri() : array
    {
        preg_match_all(
            "#".$this->_conf->{'pattern'}."#",
            strip_tags(htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES)),
            $match
        );

        return $match[count($match) - 1];
    }

    /**
     * Retourne la configuration des routes
     * @return stdClass $_conf
     */
    public function getConf() : \stdClass
    {
        return $this->_conf;
    }

    /**
     * Retourne les étapes des routes
     * @return array $_matches
     */
    public function getMatches() : array
    {
        return $this->_matches;
    }
}
