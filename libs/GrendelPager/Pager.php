<?php

namespace GrendelPager;

class Pager implements \DomainImplements\Pager\PagerImplement
{
    /**
     * Le nombre de sauts total
     * @var int
     */
    private $_nbrSteps;
    /**
     * Le nombre de saut de recherche
     * @var int
     */
    private $_step = 1;
    /**
     * Le nombre de départ de recherche
     * @var int
     */
    private $_start = 1;
    /**
     * Le nombre de limite de recherche
     * @var int
     */
    private $_limit;

    public function __construct(int $total, int $limit, array $args)
    {
        $this->_limit = $limit;
        $this->setNbrSteps($total);
        if (!empty($args)) $this->setStep($args);
        $this->setStart();
    }

    /**
     * Calcule le nombre de sauts limite
     * @param int $total : Le nombre total de publication
     */
    private function setNbrSteps(int $total) : void
    {
        $this->_nbrSteps = (int) ceil($total / $this->_limit);
    }

    /**
     * Calcule le saut de page
     * @param array $args Les arguments à analiser
     */
    private function setStep(array $args) : void
    {
        $page = array_key_last($args);

        switch ($page) {
            case 'first': break;
            case 'last':
                $this->_step = $this->_nbrSteps;
            break;
            default:
                if (is_numeric ($page)) $this->_step = (int) $page;

                if ($this->_step > $this->_nbrSteps)
                    $this->_step = $this->_nbrSteps;
            break;
        }
    }

    /**
     * Construit le nombre de départ de recherche
     * @return int
     */
    public function setStart() : void
    {
        if ($this->_step > 1)
            $this->_start += ($this->_limit * $this->_step) - $this->_limit;
    }

    /**
     * @return int Le nombre total de saut
     */
    public function getNbrSteps() : int
    {
        return $this->_nbrSteps;
    }

    /**
     * @return int : Le saut défini
     */
    public function getStep() : int
    {
        return $this->_step;
    }

    /**
     * renvoie le nombre de départ de recherche
     * @return int
     */
    public function getStart() : int
    {
        return $this->_start;
    }

    /**
     * @return int
     */
    public function getLimit() : int
    {
        return $this->_limit;
    }
}
