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

    private function __construct(\GrendelRequests\GrendelRequests $grendel)
    {
        $this->_controller = $grendel->getRequest();

        dump($this->_controller);
    }

    public static function setInstance(
        \GrendelRequests\GrendelRequests $grendel
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($grendel);
    }

    public function getController() : string
    {
        return $this->_controller;
    }
  }
