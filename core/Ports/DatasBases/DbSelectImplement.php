<?php

namespace MainPorts\DatasBases;

interface DbSelectImplement
{
    /**
     * @return stdClass : La base de données
     */
    public function getSelect() : \stdClass;
}