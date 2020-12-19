<?php

namespace MainLib;

class ParseJsConfs
implements  \MainPorts\FuncsImplement,
            \MainPorts\SingleTonImplement,
            \MainPorts\ParseConfsImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    protected static $instance;

    /**
     * Retourne les données d'un fichier *.json
     * @param  string  $filePath : Le chemin du fichier
     * @return stdClass          : Retourne un object stdClass
     */
    public function parseConf(string $filePath) : \stdClass
    {
        $file = ROOTDIRS.$filePath.'.json';

        if (!file_exists($file)) return json_decode("{}");

        return json_decode(file_get_contents($file));
    }

    /**
     * Retourne les données d'un fichier confs/*.json
     * @param  string  $filePath : Le chemin du fichier
     * @return array/stdClass    : Retourne un tableau
     *                             ou un object stdClass
     */
    public function getConf(string $filePath) : \stdClass
    {
        return parseConf('confs/'.$filePath);
    }
}
