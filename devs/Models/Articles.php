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
        \DomainInterfaces\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $db = new Db('articles');

        $pager = new Pager(
            $db->getTotal(),
            $this->_ctrlConf->{'nbrPPage'},
            $request->getArgs()
        );

        $select = new select($db, $pager);

        $this->setSelectedDatas($select->getSelect(), 'articles');
    }
}
