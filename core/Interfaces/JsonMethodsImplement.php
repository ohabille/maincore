<?php

namespace MainInterfaces;

interface JsonMethodsImplement
{
    /**
     * Retourne les données d'un fichier *.json
     * @param  string  $filePath : Le chemin du fichier
     * @return stdClass          : Retourne un object stdClass
     */
    public function parseConf(string $filePath) : \stdClass;

    /**
     * Retourne les données d'un fichier confs/*.json
     * @param  string  $filePath : Le chemin du fichier
     * @return array/stdClass    : Retourne un tableau
     *                             ou un object stdClass
     */
    public function getConf(string $filePath) : \stdClass;

    /**
     * Convertit un array en objet json
     * @param  array    $data : l'array
     * @return stdClass       : l'objet json
     */
    public function formatConf(array $data) : \stdClass;

    /**
     * Retourne le nombre d'entrées
     * @param  stdClass $obj L'objet source
     * @return int           Le nombre d'entrées
     */
    public static function getNbrOf(\stdClass $obj) : int;
}
