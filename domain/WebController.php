<?php

namespace Domain;

use \Connectors\RoutesConnector as Routes,
    \Connectors\ViewConnector as Skeleton;

class WebController implements \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;
    private $_model;

    private function __construct(
        \DomainInterfaces\Connectors\RequestsImplement $request,
        \DomainInterfaces\Connectors\RoutesImplements $routes
    )
    {
        $task = '\\Models\\'. $routes->getParams()['model'];

        $this->_model = new $task($routes->getParams(), $request->getArgs());

        $skeleton = Skeleton::getInst(
                $routes->getParams()['template'],
                $this->_model->getDatas()
        );

        $skeleton->readTemplate();
    }

    /**
     * Retourne l'instance de la classe
     * @return \MainInterfaces\SingleTonImplement : instance de la classe
     */
    private static function setInstance(
        \DomainInterfaces\Connectors\RequestsImplement $request,
        \DomainInterfaces\Connectors\RoutesImplements $routes
    ) : \MainInterfaces\SingleTonImplement
    {
        return new self::$class($request, $routes);
    }

    public function getDatas()
    {
        return $this->_model->getDatas();
    }
  }
