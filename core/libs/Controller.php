<?php

namespace MainLib;

use \GrendelTpl\Skeleton,
    \GrendelTpl\SkeletonDatas;

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
    private $_conf;
    /**
     * @var object
     */
    private $_constructor;

    private function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        $this->_conf = $request->getRoutes()->{$request->getRequest()};

        $constructor = self::$dataNamespace.$this->_conf->{'Controller'};

        $skeleton = new Skeleton($this->_conf->{'template'});

        $tpl = new SkeletonDatas(
            new $constructor($request),
            $skeleton
        );

        echo $skeleton->getView();
    }

    public static function setInstance(
        \MainPorts\Controllers\RequestImplements $request
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($request);
    }
  }
