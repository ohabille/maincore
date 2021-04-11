<?php

namespace MainInterfaces\Requests;

interface UrlMatchImplement
{
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
