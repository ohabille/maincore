<?php

namespace GrendelRequests;

class GrendelRequests
implements  \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;

    private static $Routes;
    private static $UrlMatches;
    private static $UrlRequest;
    private static $UrlArgs;

    private function __construct()
    {
        self::$Routes = Routes::getInstance();
        self::$UrlMatches = UrlMatches::getInstance(self::$Routes);
        self::$UrlRequest = UrlRequest::getInstance(
            self::$Routes,
            self::$UrlMatches
        );
        self::$UrlArgs = UrlArgs::getInstance(
            self::$Routes,
            self::$UrlMatches,
            self::$UrlRequest
        );

        if (!empty($_POST)) {
            // TO DO
        }
    }

    public function getRoutes()
    {
        return self::$Routes->getRoutes();
    }

    public function getMatches()
    {
        return self::$UrlMatches->getMatches();
    }

    public function getRequest()
    {
        return self::$UrlRequest->getRequest();
    }

    public function getArgs()
    {
        return self::$UrlArgs->getArgs();
    }
}
