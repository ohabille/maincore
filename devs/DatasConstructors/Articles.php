<?php

namespace User\DatasConstructors;

use \GrendelDb\Db;
use \MainLib\Pager;
use \GrendelDb\Select;

class Articles
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
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
    }
}
