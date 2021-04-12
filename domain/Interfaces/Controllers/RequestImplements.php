<?php

namespace MainInterfaces\Controllers;

interface RequestImplements
{
    /**
     * Retourne la requète principale
     * @return string
     */
    public function getRequest() : string;

    /**
     * Retourne les arguments
     * @return array
     */
    public function getArgs() : array;
}
