<?php

namespace MainLib;

class Routes
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

    public function __construct(\stdClass $conf)
    {
        $this->_shema = $conf->{'shema'};
        $this->_routes = $conf->{'routes'};
        $this->_pattern = $conf->{'pattern'};

        $this->setRequests($this->readStepsUri());
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
        if (!empty($rMatch)) {
            $this->readStep($rMatch);
        }
    }

    private function readStep(array $rMatch) : void
    {
        while (false !== current($this->_routes)) {
            if (!$this->readRoute($rMatch[0])) {
                next($this->_routes);

                continue;
            }

            $this->_requests[current($this->_shema)] = $rMatch[0];
            break;
        }
    }

    private function readRoute(string $route) : bool
    {
        $pattern = current($this->_routes)->{current($this->_shema)};

        return 0 != preg_match("#^".$pattern."$#", $route);
    }

    public function getRequests() : array
    {
        return $this->_requests;
    }
  }
