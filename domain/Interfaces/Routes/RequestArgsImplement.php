<?php

namespace DomainInterfaces\Routes;

interface RequestArgsImplement
{
    /**
     * Retourne les arguments de la requète
     * @return array
     */
    public function getArgs() : array;
}
