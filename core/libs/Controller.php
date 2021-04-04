<?php

namespace MainLib;

use \GrendelTpl\GrendelSkeleton as Skeleton;

class Controller implements \MainPorts\SingleTonImplement
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
    private $_route;

    private function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        $this->_route = $request->getRoutes()->{$request->getRequest()};

        $datas = self::$dataNamespace.$this->_route->{'Controller'};

        $skeleton = new Skeleton(
            $this->_route->{'template'},
            new $datas($request)
        );

        $skeleton->readTemplate();
    }

    public static function setInstance(
        \MainPorts\Controllers\RequestImplements $request
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($request);
    }
  }
