<?php

namespace GrendelRequests;

class Requests
implements \DomainInterfaces\Requests\RequestsImplement,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;
    /**
     * @var string
     */
    private $_request = '';
    /**
     * @var array
     */
    private $_postRequest = [];

    private function __construct()
    {
        if (isset($_SERVER['argv'])) $this->parseArgv();

        if (isset($_SERVER['REQUEST_URI'])) $this->parseUri();

        if (!empty($_POST)) $this->parsePostRequests();
    }

    private function parseArgv()
    {
        $argv = $_SERVER['argv'];

        if (1 < $_SERVER['argc']) {
            array_shift($argv);

            array_walk(
                $argv,
                function (&$item) { $item = self::cleanRequest($item); }
            );

            $this->_request = '/'.implode('/', $argv);
        }
    }

    private function parseUri() : void
    {
        $this->_request = self::cleanRequest($_SERVER['REQUEST_URI']);
    }

    private function parsePostRequests() : void
    {
        $this->_postRequests = $_POST;
    }

    private static function cleanRequest(string $request) : string
    {
        return strip_tags(htmlentities($request, ENT_QUOTES));
    }

    public function getRequest() : string
    {
        return $this->_request;
    }

    public function getPostRequests() : array
    {
        return $this->_postRequests;
    }
}
