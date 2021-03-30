<?php

namespace MainLib;

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
        $this->_conf = getConf('Controllers/'.$request->getRequest());

        $constructor = self::$dataNamespace.$this->_conf->{'Controller'};

        // Temporaire
        foreach ($request->getRoutes() as $val) {
            if ($val->{'menu'}) {
                echo '<a href="'.$val->{'url'}.'">'
                .$val->{'name'}.'</a><br />';
            }
        }

        $this->_constructor = new $constructor(
            $this->_conf,
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
