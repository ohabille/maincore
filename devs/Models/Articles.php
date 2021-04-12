<?php

namespace Models;

use \GrendelDb\Db,
    \Domain\Pager,
    \GrendelDb\Select;

class Articles
extends \Domain\MainConstructor
implements \MainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
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
