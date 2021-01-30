<?php

namespace MainPorts\Requests;

interface RequestImplement
{
    /**
     * Retourne la requete
     * ex : 'article'
     * @return string
     */
    public function getRequest() : string;
}
