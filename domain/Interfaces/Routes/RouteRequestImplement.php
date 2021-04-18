<?php

namespace DomainInterfaces\Routes;

interface RouteRequestImplement
{
    /**
     * Retourne la requete
     * ex : 'article'
     * @return string
     */
    public function getRequest() : string;
}
