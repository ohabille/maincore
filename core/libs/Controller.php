<?php

namespace MainLib;

use \GrendelTpl\GrendelSkeleton as Skeleton;

class Controller implements \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
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
        \MainInterfaces\Controllers\RequestImplements $request
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
        \MainInterfaces\Controllers\RequestImplements $request
    ) : \MainInterfaces\SingleTonImplement
    {
        return new self::$class($request);
    }
  }
