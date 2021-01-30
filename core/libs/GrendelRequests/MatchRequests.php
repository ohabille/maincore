<?php

/**
 * Analise la requete url et retourne le résultat sous forme d'array
 * ex :
 * array = [
 *     0=>articles,
 *     1=>page-2
 * ]
 */

namespace GrendelRequests;

class MatchRequests implements \MainPorts\Requests\MatchRequestsImplement
{
    /**
     * @var \MainPorts\Requests\RoutesImplements
     */
    private $_conf;
    /**
     * @var array
     */
    private $_matches;

    public function __construct(\MainPorts\Requests\RoutesImplement $conf)
    {
        $this->_conf = $conf;
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
            "#".$this->_conf->getMatchPattern()."#",
            strip_tags(htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES)),
            $match
        );

        return $match[count($match) - 1];
    }

    /**
     * Retourne l'instance de la class Routes
     * @return stdClass $_conf
     */
    public function getConf() : \MainPorts\Requests\RoutesImplements
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
