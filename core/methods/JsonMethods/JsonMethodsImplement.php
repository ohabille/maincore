<?php

namespace CoreMethods\JsonMethods;

interface JsonMethodsImplement extends \Core\CoreFunctions\CoreFuncsImplement
{
    /**
     * Retourne les données d'un fichier *.json
     * @param  string  $filePath : Le chemin du fichier
     * @return array             : Retourne un object stdClass
     */
    public function parseConf(string $filePath) : array;

    /**
     * Retourne les données d'un fichier confs/*.json
     * @param  string  $filePath : Le chemin du fichier
     * @return array             : Retourne un tableau
     *                             ou un object stdClass
     */
    public function getConf(string $filePath) : array;

    /**
     * Convertit un array en objet json
     * @param  array    $data : l'array
     * @return array          : l'objet json
     */
    public function formatConf(array $data) : string;
}
