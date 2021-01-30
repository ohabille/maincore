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
    private static $MatchRequest;
    private static $Request;

    private function __construct()
    {
        self::$Routes = Routes::getInstance();
        self::$MatchRequest = MatchRequests::getInstance(self::$Routes);
        self::$Request = Request::getInstance(self::$MatchRequest);
    }

    public function instanceOf(string $class)
    {
        return self::${$class};
    }
}
