<?php

namespace MainLib;

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
    protected static $instance;

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
}
