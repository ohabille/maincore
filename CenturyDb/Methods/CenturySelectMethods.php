<?php

namespace CenturyDb\Methods;

trait CenturySelectMethods
{
    /**
     * @return string : Une string vide
     */
    protected function getFirstCenturyValue() : string
    {
        return "";
    }

    /**
     * Récupère l'id d'une entrée
     * et la retourne si la valeur fournie est vide
     * ou false si la valeur fournie contient déjà un id
     * @param  string $value : La valeur fournie
     * @param  string $entry : L'entrée à analiser
     * @return mixed
     */
    protected function getFirstCentury(string $value, string $entry)
    {
        if (!empty($value)) return false;

        return $this->extractCenturyId($entry);
    }
}
