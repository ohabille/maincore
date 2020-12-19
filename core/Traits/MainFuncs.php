<?php

namespace MainTraits;

trait MainFuncs
{
    use Instance;

    /**
     * Crée des alias des methodes de la classe appelée
     * Ignore getInstance et setMethodsAlias
     * pour éviter les erreurs
     * @param $methods : ls méthodes à aliasser
     */
    public function setMethodsAlias(array $methods) : void
    {
        $class = get_called_class();

        foreach ($methods as $func) {
            eval(
                "function $func() {
                    return call_user_func_array(
                        array($class::getInstance(), '$func'),
                        func_get_args()
                    );
                }"
            );
        }
    }
}
