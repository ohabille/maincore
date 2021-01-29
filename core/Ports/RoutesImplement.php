<?php

namespace MainPorts;

interface RoutesImplement
{
    /**
     * Retourne la configuration des routes
     * @return stdClass $_conf
     */
    public function getConf() : \stdClass;
}
