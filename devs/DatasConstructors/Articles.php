<?php

namespace User\DatasConstructors;

class Articles extends MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(\stdclass $primaryDatas, array $args)
    {
        parent::__construct($primaryDatas);

        $db = new \User\Test('articles');

        $test = $db->getSomeEntries($this->_ctrlConf->{'nbrPPage'});
        dump($test);
    }
}
