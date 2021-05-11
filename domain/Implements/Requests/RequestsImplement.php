<?php

namespace DomainImplements\Requests;

interface RequestsImplement
{
    /**
     * Retourne la requète transmise
     * @return string la requète
     */
    public function getRequest() : string;
}
