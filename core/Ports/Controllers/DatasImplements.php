<?php

namespace MainPorts\Controllers;

interface DatasImplements
{
    /**
     * Retourne les données initialisées
     * @return array [description]
     */
    public function getDatas() : \stdClass;
}