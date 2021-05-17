<?php

namespace Connecters;

use \DomainImplements\Pager\PagerImplement,
    \Adapters\PagerAdapter as Pager;

class PagerConnecter
implements  PagerImplement
{
    private $_pager;

    public function __construct(int $total, int $limit, array $args)
    {
        // $this->_pager = new Pager($total, $limit, $args);
        $this->_pager = Pager::getPager($total, $limit, $args);
    }

    /**
     * @return int Le nombre total de saut
     */
    public function getNbrSteps() : int
    {
        return $this->_pager->getNbrSteps();
    }

    /**
     * @return int : Le saut défini
     */
    public function getStep() : int
    {
        return $this->_pager->getStep();
    }

    /**
     * @return int : le nombre de recherche de départ
     */
    public function getStart() : int
    {
        return $this->_pager->getStart();
    }

    /**
     * @return int : La limite du nombre de recherche
     */
    public function getLimit() : int
    {
        return $this->_pager->getLimit();
    }
}
