<?php

namespace CoreMethods;

class FilesMethods
implements  \CoreInterface\FuncsImplement,
            \CoreInterface\SingleTonImplement,
            \CoreInterface\FilesMethodsImplement
{
    use \CoreTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \CoreInterface\SingleTonImplement
     */
    private static $instance;

    /**
     * Lit un fichier et retourne son contenu
     * @param  resource $stream : Le pointeur sur le fichier
     * @return string           : Le contenu du fichier
     */
    private function getContentFile($stream)
    {
        $content = stream_get_contents($stream);

        fclose($stream);

        return false !== $content ? $content: '';
    }

    /**
     * Ouvre un fichier et retourne son contenu ou un string vide
     * @param  string $file : Le path du fichier
     * @return string       : Le contenu du fichier
     */
    public function readContentFile(string $file) : string
    {
        $stream = fopen($file, 'r');

        return false !== $stream ? $this->getContentFile($stream): '';
        // $content = '';
        //
        // if ($stream = fopen($file, 'r')) {
        //     $content = stream_get_contents($stream);
        //
        //     fclose($stream);
        // }
        //
        // return $content;
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
