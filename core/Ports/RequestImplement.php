<?php

namespace MainPorts;

interface RequestImplement
{
    /**
     * Retourne la requete
     * @return string $_request
     */
    public function getRequest() : string;
}
