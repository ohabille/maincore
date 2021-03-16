<?php

namespace User\DatasConstructors;

class Articles extends MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(\stdclass $primaryDatas, array $args)
    {
        parent::__construct($primaryDatas);

        $db = new \User\Test('articles');

        dump($db->getSomeEntries($this->_ctrlConf->{'nbrPPage'}, 2));
    }
}
