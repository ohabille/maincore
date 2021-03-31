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

        // Temporaires
        $link = $this->_datas->{'host'}.'articles/';
        echo '<br /><a href="'.$link.'first">first</a> - ';
        foreach (range(2, $pager->getNbrsteps() - 1) as $val)
            echo '<a href="'.$link.'page-'.$val.'">'.$val.'</a> - ';
        echo '<a href="'.$link.'last">last</a>';

        dump($select->getSelect());
    }
}
