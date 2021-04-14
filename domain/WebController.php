<?php

namespace Domain;

use \GrendelRequests\GrendelRequests as Requests,
    \Connectors\ViewConnector as Skeleton;

class WebController implements \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;
    /**
     * @var \stdClass
     */
    private $_route;

    private function __construct()
    {
        $request = Requests::getInstance();

        $this->_route = $request->getRoutes()->{$request->getRequest()};

        $task = '\\Models\\'.$this->_route->{'Model'};

        $model = new $task($request);

        $skeleton = Skeleton::getInstance(
                $this->_route->{'template'},
                $model->getDatas()
        );

        $skeleton->readTemplate();
    }
  }
