<?php

namespace DomainInterfaces\Connectors;

interface RequestsImplement
{
    /**
     * Retourne la requète transmise
     * @return string [description]
     */
    public function getRequest() : string;
}
