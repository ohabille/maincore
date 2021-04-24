<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelPager\Pager,
    \GrendelDb\Select;

class Articles
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        array $params, array $args
    )
    {
        parent::__construct($params, $args);

        $db = new Db('articles');

        $pager = new Pager(
            $db->getTotal(),
            $this->_params['nbrPPage'],
            $args
        );

        $select = new select($db, $pager);

        $this->setSelectedDatas($select->getSelect(), 'articles');
        // dd($this->_datas);
    }
}
