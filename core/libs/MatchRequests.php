<?php

namespace MainLib;

class MatchRequests
{
    /**
     *
     */
    private $_conf;
    /**
     * @var array
     */
    private $_matches;

    public function __construct(\MainLib\Routes $conf)
    {
        $this->_conf = $conf->getConf();
        $this->_matches = $this->readStepsUri();
    }

    private function readStepsUri() : array
    {
        preg_match_all(
            "#".$this->_conf->{'pattern'}."#",
            strip_tags(htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES)),
            $match
        );

        return $match[count($match) - 1];
    }

    public function getConf() : \stdClass
    {
        return $this->_conf;
    }

    public function getMatches() : array
    {
        return $this->_matches;
    }
}
