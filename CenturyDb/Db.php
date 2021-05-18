<?php

namespace CenturyDb;

class Db
{
    /**
     * @var string
     */
    private static $centuryName = 'century-';
    private $_century;

    public function __construct(string $dirName)
    {
        if ($handle = opendir(__DIR__.'/Db/'.$dirName)) {
            $pattern = '#'.self::$centuryName.'([1-9A])+.json#';

            while (false !== ($entry = readdir($handle))) {
                if (0 == preg_match($pattern, $entry, $out)) continue;

                $this->_century = self::$centuryName .= $out[1];

                break;
            }

            closedir($handle);
        }

        echo $this->_century;
    }
}
