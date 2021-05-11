<?php

namespace Core\CoreFuncs;

trait CoreFuncsTrait
{
    use \CoreTraits\Instance;

    /**
     * Crée des alias des methodes de la classe appelée
     * Ignore getInst et setFunction
     * pour éviter les erreurs
     * @param $methods : ls méthodes à aliasser
     */
    public function setFunction(array $methods) : void
    {
        $class = get_called_class();

        foreach ($methods as $func) {
            eval(
                "function $func() {
                    return call_user_func_array(
                        [$class::getInst(), '$func'],
                        func_get_args()
                    );
                }"
            );
        }
    }
}
