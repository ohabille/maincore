<?php

namespace MainLib;

use \GrendelTpl\Skeleton;

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

        $this->_constructor = new $constructor(
            $this->_conf,
            $request->getArgs()
        );

        // Temporaire
        echo $this->_constructor->getDatas()->{'title'}.'<br />';

        foreach ($request->getRoutes() as $val) {
            if (!$val->{'menu'}) continue;

            echo '<a href="'.$this->_constructor->getDatas()->{'host'}.'">'
                .$val->{'name'}
                .'</a> ';
        }

        $tpl = new Skeleton($this->_conf->{'url'});
    }

    public static function setInstance(
        \MainPorts\Controllers\RequestImplements $request
    ) : \MainPorts\SingleTonImplement
    {
        return new self::$class($request);
    }
  }
