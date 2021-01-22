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
        $this->_uri = strip_tags($_SERVER['REQUEST_URI']);
    }

    public function getUri()
    {
        return $this->_uri;
    }
  }
