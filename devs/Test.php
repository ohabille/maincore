<?php

namespace User;

class Test
{
    /**
     * @var \stdClass
     */
    private static $patterns;

    public function __construct(string $view)
    {
        self::$patterns = getConf('skeleton');

        $content = self::getTpls($view);
        dump(self::isSkeleton($content));
    }

    /**
     * [getTpl description]
     * @param  string $fileName : Le nom du template
     * @return string           : Le contenu du template
     */
    private static function getTpls(string $fileName)
    {
        $file = ROOTDIRS.'devs/tpls/'.$fileName.'.tpl';
    	return (file_exists($file) ? file_get_contents($file): '');
    }

    /**
     * Vérifie si le template dépends d'un autre template
     * @param  string  $content : Le contenu du template
     * @return boolean
     */
    private static function isSkeleton(string $content)
    {
    	return (
            0 < preg_match(
                self::makePattern(self::$patterns->{'skeleton'}), $content
            ) ?
            true: false
        );
    }

    /**
     * Retourne la pattern avec les délimiteurs
     * @param  string $pattern  : Le pattern
     * @param  string $opt      : Les options de recherche PCRE
     * @return string           : Le pattern délimité
     */
    private static function makePattern(string $pattern, string $opt = '')
    {
        return '#'.$pattern.'#'.$opt;
    }
  }
