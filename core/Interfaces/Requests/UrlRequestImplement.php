<?php

namespace MainInterfaces\Requests;

interface UrlRequestImplement
{
    /**
     * Retourne la requete
     * ex : 'article'
     * @return string
     */
    public function getRequest() : string;
}
