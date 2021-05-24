<?php

namespace WebModels;

use
    // \Connecters\Db\DbArticleConnecter as DbArticles,
    \Connecters\Db\DbConnecter as Db,
    \Connecters\PagerConnecter as Pager,
    \GrendelDb\Select;

class Articles
extends \Domain\MainModel
implements \DomainImplements\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        // $db = new DbArticles;
        $dbSelect = Db::getDbSelect(
            $this->_params['db'],
            $this->_params['nbrPPage']
        );

        $pager = new Pager(
            // $db->getTotal(),
            $dbSelect->getTotal(),
            $this->_params['nbrPPage'],
            $this->_params
        );

        // $select = $dbSelect->getSelect($pager->getStart());
        // $select = new select($db, $pager);
        //
        $this->setSelectedDatas(
            // $select->getSelect(),
            $dbSelect->getSelect($pager->getStart()),
            $this->_params['db']
        );
    }
}
