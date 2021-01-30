<?php

namespace MainPorts\Requests;

interface MatchRequestsImplement
{
    /**
     * Retourne l'instance de la class Routes
     * @return \MainPorts\Requests\RoutesImplements
     */
    public function getConf() : \MainPorts\Requests\RoutesImplements;

    /**
     * Retourne le résultat de la recherche de route
     * ex :
     * [
     *     0=>articles,
     *     1=>page-2
     * ]
     * @return array
     */
    public function getMatches() : array;
}
