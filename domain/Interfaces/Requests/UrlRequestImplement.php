<?php

namespace DomainInterfaces\Requests;

interface UrlRequestImplement
{
    /**
     * Retourne la requete
     * ex : 'article'
     * @return string
     */
    public function getRequest() : string;
}
