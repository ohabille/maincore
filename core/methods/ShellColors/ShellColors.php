<?php

namespace CoreMethods\ShellColors;

class ShellColors implements ShellColorsImplement
{
    use \Core\CoreFuncs\CoreFuncsTrait;

    /**
     * instance de la classe
     * @var \CoreInterface\SingleTonImplement
     */
    private static $instance;

    /**
     * Chaîne de déclaration d'une couleur
     * @var string
     */
    private static $esc = "\e[";
    /**
     * Chaîne de fermeture d'une couleur
     * @var string
     */
    private static $end = "\e[0m";

    /**
     * Code couleur light Green
     * @var string
     */
    private static $lightGreen = "1;32m";
    /**
     * Code couleur Brown
     * @var string
     */
    private static $brown = "0;33m";
    /**
     * Code couleur Light Red
     * @var string
     */
    private static $lightRed = "1;31m";
    /**
     * Code couleur Red
     * @var string
     */
    private static $red = "0;31m";

    /**
     * retourne la chaine formatée en light green
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellLightGreen(string $var) : string
    {
        return getShellColor(self::$lightGreen, $var);
    }

    /**
     * retourne la chaine formatée en brown
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellBrown(string $var) : string
    {
        return getShellColor(self::$brown, $var);
    }

    /**
     * retourne la chaine formatée en light red
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellLightRed(string $var) : string
    {
        return getShellColor(self::$lightRed, $var);
    }

    /**
     * retourne la chaine formatée en red
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellRed(string $var) : string
    {
        return getShellColor(self::$red, $var);
    }

    /**
     * retourne la chaine formatée à la couleur fournit
     * @param  string $color : Le code couleur
     * @param  string $var   : La chaîne brute
     * @return string        : La chaîne formatée
     */
    public function getShellColor(string $color, string $var) : string
    {
        return self::$esc.$color.$var.self::$end;
    }
}
