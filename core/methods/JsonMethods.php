<?php

namespace MainMethods;

class JsonMethods
implements  \MainInterfaces\FuncsImplement,
            \MainInterfaces\SingleTonImplement,
            \MainInterfaces\JsonMethodsImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    /**
     * Retourne les données d'un fichier *.json
     * @param  string  $filePath : Le chemin du fichier
     * @return array             : Retourne un object stdClass
     */
    public function parseConf(string $filePath) : array
    {
        $content = readContentFile($filePath.'.json');

        return json_decode(
            !empty($content) ? $content: '{}',
            true
        );
    }

    /**
     * Retourne les données d'un fichier confs/*.json
     * @param  string $filePath : Le chemin du fichier
     * @return array            : Retourne un tableau
     *                            ou un object stdClass
     */
    public function getConf(string $filePath) : array
    {
        return parseConf(ROOTDIRS.'confs/'.$filePath);
    }

    /**
     * Convertit un array en objet json
     * @param  array  $data : l'array
     * @return string       : l'objet json
     */
    public function formatConf(array $data) : string
    {
        return json_encode($data);
    }
}
