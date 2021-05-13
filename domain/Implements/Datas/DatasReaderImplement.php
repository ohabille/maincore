<?php

namespace DomainImplements\Datas;

interface DatasReaderImplement
{
    /**
     */
    public function getMainDatas() : array;

    /**
     */
    public function isConf(string $name) : bool;

    /**
     */
    public function setConf(string $name) : void;

    /**
     */
    public function getConf() : array;

    /**
     */
    public function getTime(int $time) : array;

    /**
     */
    public function getSections(string $file) : array;

    /**
     */
    public function getsectioncontent(string $section, string $file) : string;
}
