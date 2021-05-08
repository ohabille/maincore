<?php

namespace GrendelRequests;

class Requests implements \DomainInterfaces\Requests\RequestsImplement
{
    /**
     * @var string
     */
    private $_request = '/';

    public function __construct()
    {
        $task = isset($_SERVER['argv']) ? 'parseArgv': 'parseUri';

        $this->setRequests($this->$task());

        if (!empty($_POST)) $this->parsePostRequests();
    }

    private function parseArgv() : string
    {
        return '/'.implode(
            '/',
            self::cleanTab(
                array_slice($_SERVER['argv'], 1)
            )
        );
    }

    private function parseUri() : string
    {
        return self::cleanRequest($_SERVER['REQUEST_URI']);
    }

    private function setRequests(string $request) : void
    {
        $this->_request .= 'request'.$request;
    }

    private function parsePostRequests() : void
    {
        $this->writeRequest(
            array_combine(
                self::cleanTab(array_keys($_POST)),
                self::cleanTab($_POST)
            )
        );
    }

    private function writeRequest(array $request) : void
    {
        for ($i = 0; $i < count($request); $i++) {
            $key = array_keys($request)[$i];

            if (is_array($request[$key])) {
                $this->writeRequest($request[$key]);
                continue;
            }

            $this->_test .= '/'.$key.'/'.$request[$key];
        }
    }

    private static function cleanTab(array $tab) : array
    {
        return array_map(
            function ($item) {
                if (is_array($item)) return self::cleanTab($item);

                return self::cleanRequest($item);
            },
            $tab
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
}
