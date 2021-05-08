<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelPager\Pager,
    \GrendelDb\Select;

class Articles
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct(
        array $params
    )
    {
        parent::__construct($params);

        $db = new Db('articles');

        $pager = new Pager(
            $db->getTotal(),
            $this->_params['nbrPPage'],
            $params
        );

        $select = new select($db, $pager);

        $this->setSelectedDatas($select->getSelect(), 'articles');
    }
}
