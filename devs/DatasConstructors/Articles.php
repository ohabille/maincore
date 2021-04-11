<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \MainLib\Pager,
    \GrendelDb\Select;

class Articles
extends \MainLib\MainConstructor
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

        // dd($this->_datas);
    }
}
