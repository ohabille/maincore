<?php

namespace MainMethods;

class Dumps
implements  \MainInterfaces\FuncsImplement,
            \MainInterfaces\SingleTonImplement
{
    use \MainTraits\MainFuncs;

    /**
     * instance de la classe
     * @var \MainInterfaces\SingleTonImplement
     */
    protected static $instance;

    private $_patts = [
        '#(\[)("?(_|[a-z0-9])[a-zA-Z0-9]*"?)#',
        '#([a-z][a-z]+)(\([a-z0-9]+\))#',
        '#([a-z]+)'
            .'(\()'
            .'([\\a-zA-Z]+)'
            .'(\))'
            .'(\#[0-9]+)'.
            '(\h\([0-9]+\))#',
        '#\{#',
        '#\}#'
    ];

    private $_htmlRempls = [
        '<br />$1<span style="color:red;">$2</span>',
        '<br /><span style="color:palevioletred;">$1</span>$2',
        '<br /><span style="color:blue;">$1</span>$2'
            .'<span style="color:mediumvioletred;">$3</span>$4'
            .'<span style="color:blue;">$5</span>$6',
        '<div>{<div style="margin-left: 50px;">',
        '</div>}</div>'
    ];

    /**
     * affiche les propriétées d'une variable
     * @param $var  : la variable à analiser
     */
    public function dump($var) : void
    {
        echo preg_replace(
            $this->_patts,
            $this->getRempls(),
            $this->getDump($var)
        );
    }

    /**
     * affiche les propriétées d'une variable
     * et arrête le script
     * @param $var  : la variable à analiser
     */
    public function dd($var) : void
    {
        $this->dump($var);
        exit();
    }

    /**
    * retourne le tableau de remplacement
    * @return array : Le tableau
    */
    private function getRempls() : array
    {
        if (!isset($_SERVER['HTTP_USER_AGENT']))
            return $this->getShellRempls();

        return $this->_htmlRempls;
    }

    /**
    * Retourne le tableau de remplacement pour le shell
    * @return array : Le tableau
    */
    private function getShellRempls() : array
    {
        return [
            '$1'.shellBrown('$2'),
            shellLightRed('$1').'$2',
            shellRed('$1').'$2'.shellLightGreen('$3')
            .'$4'.shellRed('$5').'$6',
            '{',
            '}'
        ];
    }

    /**
     * Retourne le résultat de var_dump
     * @param  mixed $var : La variable à dumper
     * @return string      : Le résultat de var_dump
     */
    private function getDump($var) : string
    {
        ob_start();
        var_dump($var);
        return ob_get_clean();
    }
}
