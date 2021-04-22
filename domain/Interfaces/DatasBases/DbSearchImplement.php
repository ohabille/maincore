<?php

namespace DomainInterfaces\DatasBases;

interface DbSearchImplement
{
    public function isInDb(string $from) : bool;

    public function searchInDb(string $from, string $needle) : bool;

    public function isInDatas(string $from) : bool;

    public function searchInDatas(string $from, string $needle) : bool;

    public function getKeyCurrent() : string;

    public function getCurrent() : array;

    /**
     * @return array : La base de données
     */
    public function getFind() : array;
}
