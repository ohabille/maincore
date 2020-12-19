<?php

namespace MainLib;

class ParseConfs
implements  \MainPorts\FuncsImplement,
            \MainPorts\SingleTonImplement,
            \MainPorts\ParseConfsImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;
    /**
     * Instance d'un modèle de lecture de données json
     */
    private $_model;

    private function __construct()
    {
        $this->_model = ParseJsConfs::getInstance();
    }

    /**
     * Retourne les données d'un fichier *.json
     * @param  string  $filePath : Le chemin du fichier
     * @return stdClass        : Retourne un object stdClass
     */
    public function parseConf(string $filePath) : \stdClass
    {
        return $this->_model->parseConf($filePath);
    }

    /**
     * Retourne les données d'un fichier confs/*.json
     * @param  string  $filePath : Le chemin du fichier
     * @return array/stdClass        : Retourne un tableau
     *                                 ou un object stdClass
     */
    public function getConf(string $filePath) : \stdClass
    {
        return $this->_model->parseConf($filePath);
    }
}
