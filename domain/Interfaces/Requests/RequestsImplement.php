<?php

namespace DomainInterfaces\Requests;

interface RequestsImplement
{
    /**
     * Retourne la requète transmise
     * @return string [description]
     */
    public function getRequest() : string;

    /**
     * Retourne les paramètre transmis par $_POST
     * @return array [description]
     */
    public function getPostRequests() : array;
}
