<?php

namespace SendConnectors;

use \GetConnectors\GetRoutesConnectors as Route;

class SendRoutesConnector
implements SingleConnectorImplement
{
    /**
     * @var \CoreImplements\GetConnectorsImplement
     */
    private static $instance;

    public static function getInst() : \GetConnectors\GetRoutesConnectors
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
        return self::getInst()->getParams();
    }

    /**
     * @return array : Les paramètres des routes
     */
    public static function getRoutes() : array
    {
        return self::getInst()::getRoutes();
    }
}
