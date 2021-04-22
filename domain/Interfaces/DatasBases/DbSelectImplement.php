<?php

namespace DomainInterfaces\DatasBases;

interface DbSelectImplement
{
    /**
     * @return array : La base de données
     */
    public function getSelect() : array;
}
