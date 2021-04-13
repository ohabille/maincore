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
    protected static $instance;

    /**
     * Retourne les données d'un fichier *.json
     * @param  string  $filePath : Le chemin du fichier
     * @return stdClass          : Retourne un object stdClass
     */
    public function parseConf(string $filePath) : \stdClass
    {
        $content = readContentFile($filePath.'.json');

        return json_decode(
            !empty($content) ?
            $content: '{}'
        );
    }

    /**
     * Retourne les données d'un fichier confs/*.json
     * @param  string  $filePath : Le chemin du fichier
     * @return array/stdClass    : Retourne un tableau
     *                             ou un object stdClass
     */
    public function getConf(string $filePath) : \stdClass
    {
        return parseConf(ROOTDIRS.'confs/'.$filePath);
    }

    /**
     * Convertit un array en objet json
     * @param  array    $data : l'array
     * @return stdClass       : l'objet json
     */
    public function formatConf(array $data) : \stdClass
    {
        return json_decode(json_encode($data));
    }

    /**
     * Retourne le nombre d'entrées
     * @param  stdClass $obj L'objet source
     * @return int           Le nombre d'entrées
     */
    public static function getNbrOf(\stdClass $obj) : int
    {
        return count(get_object_vars($obj));
    }
}
