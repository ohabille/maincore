<?php

namespace DomainImplements\DatasBases;

interface DbSelectImplement
{
    /**
     * @return array : La base de données
     */
    public function getSelect() : array;
}
