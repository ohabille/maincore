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

class UrlMatches
implements  \MainPorts\Requests\UrlMatchImplement,
            \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;

    /**
     * @var \MainPorts\Requests\RoutesImplement
     */
    private $_routes;
    /**
     * @var array
     */
    private $_matches;

    private function __construct(\MainPorts\Requests\RoutesImplement $routes)
    {
        $this->_routes = $routes;
        $this->_matches = $this->readStepsUri();
    }

    public static function constructClass(
        \MainPorts\Requests\RoutesImplement $routes
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($routes);
    }

    /**
     * Compare l'url au pattern des Routes
     * et retourne le résultat sous forme d'un tableau
     * @return array : Le résultat de la comparaison
     */
    private function readStepsUri() : array
    {
        preg_match_all(
            "#".$this->_routes->getMatchPattern()."#",
            strip_tags(htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES)),
            $match
        );

        return $match[count($match) - 1];
    }

    /**
     * Retourne l'instance de la class Routes
     * @return \MainPorts\Requests\RoutesImplement
     */
    public function getRoutes() : \MainPorts\Requests\RoutesImplement
    {
        return $this->_routes;
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
