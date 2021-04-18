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
     * @var \stdClass
     */
    private $_params;

    private function __construct()
    {
        $routes = Routes::getInstance(Requests::getInstance()->getRequest());

        $this->_params = $routes->getParams();

        $task = '\\Models\\'.$this->_params->{'Model'};

        $model = new $task($routes);

        $skeleton = Skeleton::getInstance(
                $this->_params->{'template'},
                $model->getDatas()
        );

        $skeleton->readTemplate();
    }
  }
