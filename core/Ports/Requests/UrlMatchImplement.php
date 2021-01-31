<?php

namespace MainPorts\Requests;

interface UrlMatchImplement
{
    /**
     * Retourne l'instance de la class Routes
     * @return \MainPorts\Requests\RoutesImplement
     */
    public function getRoutes() : \MainPorts\Requests\RoutesImplement;

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
