<?php

namespace DomainInterfaces\Requests;

interface RequestArgsImplement
{
    /**
     * Retourne les arguments de la requète
     * @return array
     */
    public function getArgs() : array;
}
