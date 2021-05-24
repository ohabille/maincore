<?php

namespace WebModels;

use \Connecters\Db\DbConnecter as Db,
    \Connecters\PagerConnecter as Pager,
    \GrendelDb\Select;

class Articles
extends \Domain\MainModel
implements \DomainImplements\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $dbSelect = Db::getDbSelect(
            $this->_params['db'],
            $this->_params['nbrPPage']
        );

        $pager = new Pager(
            $dbSelect->getTotal(),
            $this->_params['nbrPPage'],
            $this->_params
        );

        $this->setSelectedDatas(
            $dbSelect->getSelect($pager->getStart()),
            $this->_params['db']
        );
    }
}
