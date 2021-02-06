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

    public function instanceOf(string $class)
    {
        return self::${$class};
    }
}
