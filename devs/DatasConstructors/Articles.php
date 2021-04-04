<?php

namespace User\DatasConstructors;

use \GrendelDb\Db;
use \MainLib\Pager;
use \GrendelDb\Select;

class Articles
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(\stdclass $CtrlConf, array $args)
    {
        parent::__construct($CtrlConf);

        $db = new Db('articles');

        $pager = new Pager(
            $db->getTotal(),
            $this->_ctrlConf->{'nbrPPage'},
            $args
        );

        $select = new select($db, $pager);
    }
}
