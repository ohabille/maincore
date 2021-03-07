<?php

namespace User;

class Test implements \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;
    private static $dataNamespace = '\\User\\DatasConstructors\\';
    /**
     * @var object
     */
    private $_controller;

    private function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        $constructor = self::$dataNamespace.$request->getRequest();

        $this->_controller = new $constructor($request->getArgs());

        dump($this->_controller->getDatas());
    }

    public static function setInstance(
        \MainPorts\Controllers\RequestImplements $request
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($request);
    }
  }
