<?php

namespace MainLib;

class Datas
{
    private static $confs;
    private $_conf;

    public function __construct()
    {
        self::$confs = getConf('datasConf');
    }

    public function setConf(string $name) : void
    {
        $this->_conf = self::$confs->{$name};
    }

    public function getContent(string $file) : string
    {
        return file_get_contents(
            ROOTDIRS.$this->_conf->{'dir'}
            .$file
            .$this->_conf->{'ext'}
        );
    }

    public function getTime(int $time) : array
    {
        return $this->readDateKeys(getdate($time));
    }

    private function readDateKeys(array $time) : array
    {
        $date = [];

        foreach ($this->_conf->{'time'} as $form)
            if (isset($time[$form])) $date[$form] = $time[$form];

        return $date;
    }

    public function readDataKeys(\stdClass $data) : array
    {
        $datas = [];

        foreach ($this->_conf->{'dataKeys'} as $key)
            if (isset($data->{$key})) $datas[$key] = $data->{$key};

        return $datas;
    }

    public function getSections(string $content) : array
    {
        $mask = implode('|', $this->_conf->{'balises'});
        $pattern = '#\[('.$mask.')\](.*)\[\/('.$mask.')\]#Us';

        if (0 === preg_match_all($pattern, $content, $matches))
            return [$content];

        return array_combine($matches[1], $matches[2]);
    }
}
