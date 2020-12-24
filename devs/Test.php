<?php

namespace User;

class Test
{
    /**
     * @var array
     */
    private $_conf;

    public function __construct()
    {
        $this->_conf = $this->readStdClass(
            parseConf('devs/test')
        );
    }

    private function readStdClass(\stdClass $std) : array
    {
        while ( false !== current($std) ) {
            $conf[key($std)] = $this->getCurrent($std);

            next($std);
        }

        return $conf;
    }

    private function getCurrent(\stdClass $std)
    {
        return is_a(current($std), '\stdClass') ?
            $this->readStdClass(current($std)):
            current($std);
    }

    public function getConf()
    {
        return $this->_conf;
    }
}
