<?php

namespace MainPorts;

interface MatchRequestsImplement
{
    /**
     * Retourne la configuration des routes
     * @return stdClass $_conf
     */
    public function getConf() : \stdClass;

    /**
     * Retourne le résultat de la recherche de route
     * @return array $_matches
     */
    public function getMatches() : array;
}
