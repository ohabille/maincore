<?php

namespace WebModels;

use \Connecters\Db\DbArticleConnecter as DbArticles,
    \Connecters\PagerConnecter as Pager,
    \GrendelDb\Select;

class Articles
extends \Domain\MainModel
implements \DomainImplements\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $db = new DbArticles;

        $pager = new Pager(
            $db->getTotal(),
            $this->_params['nbrPPage'],
            $this->_params
        );

        $select = new select($db, $pager);

        $this->setSelectedDatas($select->getSelect(), 'articles');
    }
}
