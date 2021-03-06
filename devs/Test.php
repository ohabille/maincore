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
    private $_controller;

    private function __construct(string $controller)
    {
        $this->_controller = $controller;
    }

    public static function setInstance(
        string $controller
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($controller);
    }

    public function getController() : string
    {
        return $this->_controller;
    }
  }
