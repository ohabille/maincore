<?php

namespace DomainImplements\Pager;

interface PagerImplement
{
    /**
     * @return int Le nombre total de saut
     */
    public function getNbrSteps() : int;

    /**
     * @return int : Le saut défini
     */
    public function getStep() : int;

    /**
     * @return int : le nombre de recherche de départ
     */
    public function getStart() : int;

    /**
     * @return int : La limite du nombre de recherche
     */
    public function getLimit() : int;
}
