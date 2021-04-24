<?php

namespace Domain;

use \Connectors\RequestsConnector as Requests,
    \Connectors\RoutesConnector as Routes,
    \Connectors\ViewConnector as Skeleton;

class WebController implements \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;
    /**
     * @var array
     */
    private $_params;

    private function __construct()
    {
        $request = Requests::getInstance();

        $routes = Routes::getInstance($request->getRequest());

        $task = '\\Models\\'. $routes->getParams()['model'];

        $model = new $task($routes->getParams(), $request->getArgs());

        $skeleton = Skeleton::getInstance(
                $routes->getParams()['template'],
                $model->getDatas()
        );

        $skeleton->readTemplate();
    }
  }
