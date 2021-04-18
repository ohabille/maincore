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
        \DomainInterfaces\Controllers\RoutesImplements $params
    )
    {
        parent::__construct($params);

        $db = new Db('articles');

        $pager = new Pager(
            $db->getTotal(),
            $this->_params->{'nbrPPage'},
            $params->getArgs()
        );

        $select = new select($db, $pager);

        $this->setSelectedDatas($select->getSelect(), 'articles');
    }
}
