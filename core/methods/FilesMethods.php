<?php

namespace MainMethods;

class FilesMethods
implements  \MainInterfaces\FuncsImplement,
            \MainInterfaces\SingleTonImplement,
            \MainInterfaces\FilesMethodsImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainInterfaces\SingleTonImplement
     */
    private static $instance;

    /**
     * Retourne le contenu d'un fichier
     * @param  string $file : Le path du fichier
     * @return string       : Le contenu du fichier
     */
    public function readContentFile(string $file) : string
    {
        $content = '';

        if ($stream = fopen($file, 'r')) {
            $content = stream_get_contents($stream);

            fclose($stream);
        }

        return $content;
    }

    /**
     * Retourne le répertoire source du projet
     * @return string : Le repertoire source
     */
    public static function getMainDir() : string
    {
        $i = count(
            array_diff(
                self::getPath(getcwd()),
                self::getPath(__DIR__),
            )
        );

        $srcDir = '';

        while (0 < $i) {
            $srcDir .= '../';
            $i--;
        }

        return $srcDir;
    }

    /**
     * Retourne un tableau d'arborescence
     * @param  string $path : le chemin à analiser
     * @return array        : Les répertoires
     */
    private static function getPath(string $path) : array
    {
        preg_match_all('#((\\\\|/)[[:alnum:]]+)#', $path, $match);
        return $match[1];
    }
}
