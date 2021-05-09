<?php

namespace CoreInterface;

interface ShellColorsImplement
{
    /**
     * retourne la chaine formatée en light green
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellLightGreen(string $var) : string;

    /**
     * retourne la chaine formatée en brown
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellBrown(string $var) : string;

    /**
     * retourne la chaine formatée en light red
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellLightRed(string $var) : string;

    /**
     * retourne la chaine formatée en red
     * @param  string $var : La chaîne brute
     * @return string      : La chaîne formatée
     */
    public function shellRed(string $var) : string;

    /**
     * retourne la chaine formatée à la couleur fournit
     * @param  string $color : Le code couleur
     * @param  string $var   : La chaîne brute
     * @return string        : La chaîne formatée
     */
    public function getShellColor(string $color, string $var) : string;
}
