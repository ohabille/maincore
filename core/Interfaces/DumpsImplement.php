<?php

namespace CoreInterface;

interface DumpsImplement
{
    /**
     * affiche les propriétées d'une variable
     * @param $var  : la variable à analiser
     */
    public function dump($var) : void;

    /**
     * affiche les propriétées d'une variable
     * et arrête le script
     * @param $var  : la variable à analiser
     */
    public function dd($var) : void;
}
