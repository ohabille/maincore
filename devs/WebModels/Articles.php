<?php

namespace WebModels;

use \GrendelDb\Db,
    \GrendelPager\Pager,
    \GrendelDb\Select;

class Articles
extends \Domain\MainModel
implements \DomainImplements\WebModels\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $db = new Db('articles');

        $pager = new Pager(
            $db->getTotal(),
            $this->_params['nbrPPage'],
            $this->_params
        );

        $select = new select($db, $pager);

        $this->setSelectedDatas($select->getSelect(), 'articles');
    }
}
