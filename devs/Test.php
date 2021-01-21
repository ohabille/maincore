<?php

namespace User;

class Test
{
    /**
     * @var array
     */
    private $_conf;
    /**
     * @var string
     */
    private $_uri;

    public function __construct()
    {
        $this->_conf = $this->readStdClass(parseConf('devs/test'));
        $this->_uri = strip_tags($_SERVER['REQUEST_URI']);
    }

    private function readStdClass($std) : array
    {
        while ( false !== current($std) ) {
            $conf[key($std)] = $this->getCurrent($std);

            next($std);
        }

        return $conf;
    }

    private function getCurrent($std)
    {
        $current = current($std);

        return $this->isReadable($current) ?
            $this->readStdClass($current):
            $current;
    }

    private function isReadable($std)
    {
        if (is_a($std, '\stdClass') || is_array($std))
            return true;

        return false;
    }

    public function getConf()
    {
        return $this->_conf;
    }

    public function getUri()
    {
        return $this->_uri;
    }
  }
