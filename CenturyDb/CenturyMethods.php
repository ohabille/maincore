<?php

namespace CenturyDb;

trait CenturyMethods
{
    /**
     * Vérifie si il existe une century suivante
     * @return bool
     */
    protected function isNextCentury() : bool
    {
        $modulo = $this->getReverseId($this->_century) % self::$dbMulti;
        if (0 !== $modulo) return false;

        return 100 < $this->getReverseId($this->_century);
    }

    /**
     * Initialise la prochaine century d'entrées
     * si c'est possible
     * @return bool : true, si il y en existe une
     *              false, si il n'y en a pas
     */
    protected function setNextCentury() : bool
    {
        if (!$this->isNextCentury()) return false;

        $next = $this->getReverseId($this->_century) - self::$dbMulti;

        $this->_century = next;

        return true;
    }

    /**
     * Initialise la century précédente si il en existe une
     * @return bool
     */
    protected function setPreviousCentury() : bool
    {
        $previous = $this->getPreviousId();

        if (!$this->isCenturyExists()) return false;

        $this->_century = $this->getCenturyId($previous);

        return true;
    }

    /**
     * Retourne l'id de la prochaine century
     * @return string [description]
     */
    protected function getPreviousId() : string
    {
        return $this->getCenturyId(
            $this->getReverseId($this->_century) + self::$dbMulti
        );
    }
}
