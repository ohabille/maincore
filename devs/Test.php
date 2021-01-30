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
    private $_test;

    private function __construct(string $test)
    {
        $this->_test = $test;
    }

    public static function constructClass(
        string $test
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($test);
    }

    public function getTest() : string
    {
        return $this->_test;
    }
  }
