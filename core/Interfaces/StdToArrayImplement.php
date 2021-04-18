<?php

namespace MainInterfaces;

interface StdToArrayImplement
{
    /**
     * Retourne un object stdClass convertit en array
     * @var    stdClass $std : L'object srdClass
     * @return array         : un array
     */
    public function stdToArray(\stdClass $std) : array;
}
