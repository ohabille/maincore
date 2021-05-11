<?php

namespace Core\CoreFuncs;

interface CoreFuncsImplement extends \CoreInterface\SingleTonImplement
{
    /**
     * Créer des alias des méthodes de la classe
     */
    public function setFunction(array $methods) : void;
}
