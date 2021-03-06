<?php

namespace GrendelDatas;

class DatasReader
implements  \DomainImplements\Datas\DatasReaderImplement
{
    private $_conf;

    private function getSectionPattern(string $mask, string $content) : string
    {
        return '#\[('.$mask.')\](.*)\[\/('.$mask.')\]#Us';
    }

    private function getContent(string $file) : string
    {
        return readContentFile(
            __DIR__.'/datas//'.$this->_conf['dir']
            .$file
            .$this->_conf['ext']
        );
    }

    private function getDatasConf() : array
    {
        return parseConf(__DIR__.'/jsons/datasConf');
    }

    public function getMainDatas() : array
    {
        return parseConf(__DIR__.'/jsons/mainDatas');
    }

    public function isConf(string $name) : bool
    {
        return isset($this->getDatasConf()[$name]);
    }

    public function setConf(string $name) : void
    {
        $this->_conf = $this->getDatasConf()[$name];
    }

    public function getTime(int $time) : array
    {
        $time = getdate($time);
        $date = [];

        foreach ($this->_conf['time'] as $form)
            if (isset($time[$form])) $date[$form] = $time[$form];

        return $date;
    }

    public function getSections(string $file) : array
    {
        $content = $this->getContent($file);

        $mask = implode('|', $this->_conf['balises']);
        $pattern = $this->getSectionPattern($mask, $content);

        if (0 === preg_match_all($pattern, $content, $matches))
            return [$content];

        return array_combine($matches[1], $matches[2]);
    }

    public function getsectioncontent(string $section, string $file) : string
    {
        $content = $this->getContent($file);
        $pattern = $this->getSectionPattern($section, $content);

        if (0 === preg_match($pattern, $content, $matches)) return '';

        return $matches[2];
    }

    public function getConf() : array
    {
        return $this->_conf;
    }
}
