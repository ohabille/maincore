<?php

function clean(string $foo) : string
{
    return strip_tags(
        htmlentities(
            $foo,
            ENT_QUOTES
        )
    );
}

$dbName = clean($_SERVER['argv'][1]);

$dir = __DIR__.'/'.clean($_SERVER['argv'][2]);

$cacheName = __DIR__.'/cache/'.$dbName.'_total'
    .clean($_SERVER['argv'][3]).'.txt';

$option = isset($_SERVER['argv'][4]) ? '-d */ ': '';

$task = 'cd '.$dir
    .' & ls '.$option.'| wc -l > '
    .$cacheName;

system($task);

?>
