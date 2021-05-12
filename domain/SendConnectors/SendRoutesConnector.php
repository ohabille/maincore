<?php

namespace SendConnectors;

use \GetConnectors\GetRoutesConnectors as Route;

class SendRoutesConnector
{
    /**
     * @var \CoreImplements\GetConnectorsImplement
     */
    private static $instance;

    public static function getInst(
    ) : \GetConnectors\GetRoutesConnectors
    {
        self::setInst();

        return self::$instance;
    }

    public static function setInst() : void
    {
        if (is_null(self::$instance)) self::$instance = new Route();
    }

    public static function getParams() : array
    {
        self::setInst();

        return self::$instance->getParams();
    }

    /**
     * @return array : Les paramètres des routes
     */
    public static function getRoutes() : array
    {
        self::setInst();

        return self::$instance::getRoutes();
    }
}
