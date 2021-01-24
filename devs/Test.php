<?php

namespace User;

class Test
{
    /**
     * @var array
     */
    private $_shema;
    /**
     * @var string
     */
    private $_pattern;
    /**
     * @var \stdClass
     */
    private $_routes;
    /**
     * @var array
     */
    private $_requests;

    public function __construct()
    {
        $conf = parseConf('devs/test');

        $this->_shema = $conf->{'shema'};
        $this->_routes = $conf->{'routes'};
        $this->_pattern = $conf->{'pattern'};

        $this->setRequests($this->readStepsUri());

        if (is_null($this->_requests)) {
            $this->_requests[current($this->_shema)] = key($this->_routes);
        }
    }

    private function readStepsUri() : array
    {
        preg_match_all(
            "#".$this->_pattern."#",
            strip_tags(htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES)),
            $match
        );

        return $match[count($this->_shema)];
    }

    private function setRequests(array $rMatch) : void
    {
        foreach ($rMatch as $k=>$val)
            $this->readStep($rMatch[0], $k, $val);
    }

    private function readStep(string $match, int $step, string $val) : void
    {
        if($this->isRoute($match)) {
            if ($this->readRoute($match, $step, $val))
                $this->_requests[$this->_shema[$step]] = $val;
        }
    }

    private function isRoute(string $route) : bool
    {
        return isset($this->_routes->{$route});
    }

    private function readRoute(string $route, int $step, string $val) : bool
    {
        return 0 != preg_match(
            "#^".$this->_routes->{$route}->{$this->_shema[$step]}."$#",
            $val
        );
    }

    public function getRequests() : array
    {
        return $this->_requests;
    }
  }
