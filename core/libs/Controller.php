<?php

namespace MainLib;

use \Connectors\ViewConnector as Skeleton;

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
    private static $modelNamespace = '\\Constructors\\';
    /**
     * @var \stdClass
     */
    private $_route;

    private function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
    )
    {
        $this->_route = $request->getRoutes()->{$request->getRequest()};

        $model = self::$modelNamespace.$this->_route->{'Controller'};

        $skeleton = Skeleton::getInstance(
                $this->_route->{'template'},
                new $model($request)
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
