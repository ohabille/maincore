<?php

namespace Domain\Models;

class WebModel
{
    /**
     * @var \DomainImplements\Models\ModelImplements
     */
    private static $instance = null;

    /**
     * Construit (si nécessaire) l'instance de la classe et la retourne
     * @param  string $model : le nom du model
     * @return \DomainImplements\Models\ModelImplements
     */
    public static function getInst(
        string $model
    ) : \DomainImplements\Models\ModelImplements
    {
        if (is_null(self::$instance)) {
            $task = '\\WebModels\\'.$model;

            self::$instance = new $task;
        }

        return self::$instance;
    }

    /**
     * Retourne les données du modele
     * @param  string $model : le nom du modele
     * @return array : les données du model
     */
    public static function getDatas(string $model) : array
    {
        return self::getInst($model)->getDatas();
    }
}
