<?php

namespace User;

class Test implements \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;
    /**
     * @var string
     */
    private static $dataNamespace = '\\User\\DatasConstructors\\';
    /**
     * @var \stdClass
     */
    private $_conf;
    /**
     * @var object
     */
    private $_controller;

    private function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        $this->_conf = getConf('Controllers/'.$request->getRequest());

        $constructor = self::$dataNamespace.$this->_conf->{'Controller'};

        $this->_controller = new $constructor(
            $this->_conf->{'datas'},
            $request->getArgs()
        );
    }

    public static function setInstance(
        \MainPorts\Controllers\RequestImplements $request
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($request);
    }
  }
