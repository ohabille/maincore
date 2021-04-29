<?php

namespace GrendelRequests;

class Requests
implements \DomainInterfaces\Connectors\RequestsImplement
{
    /**
     * @var string
     */
    private $_request = '';
    /**
     * @var array
     */
    private $_args = [];
    /**
     * @var array
     */
    private $_postRequest = [];

    public function __construct()
    {
        $task = isset($_SERVER['argv']) ? 'parseArgv': 'parseUri';

        $this->setRequests($this->$task());

        if (!empty($_POST)) $this->parsePostRequests();
    }

    private function parseArgv() : string
    {
        $argv = array_slice($_SERVER['argv'], 1);

        if (1 < $_SERVER['argc']) {
            array_walk(
                $argv,
                function (&$item) { $item = self::cleanRequest($item); }
            );

            return '/'.implode('/', $argv);
        }

        return '/';
    }

    private function parseUri() : string
    {
        return self::cleanRequest($_SERVER['REQUEST_URI']);
    }

    private function setRequests(string $request) : void
    {
        $argv = array_slice(explode('/', $request), 1);

        $this->_request = $argv[0];

        if (1 < count($argv)) {
            for ($i = 1; $i < count($argv); $i++) {
                $regex = preg_match(
                    '#([_a-zA-Z]+)-([_a-zA-Z0-9]+)#',
                    $argv[$i], $find
                );

                if (0 < $regex) $this->_args[$find[1]] = $find[2];
                else $this->_args[$argv[$i - 1]] = $argv[$i];
            }
        }
    }

    private function parsePostRequests() : void
    {
        $this->_postRequests = array_map(
            function ($item) { return self::cleanRequest($item); },
            $_POST
        );
    }

    private static function cleanRequest(string $request) : string
    {
        return strip_tags(htmlentities($request, ENT_QUOTES));
    }

    public function getRequest() : string
    {
        return $this->_request;
    }

    public function getArgs() : array
    {
        return $this->_args;
    }
}
