<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \MainLib\Pager,
    \GrendelDb\Select,
    \MainLib\Datas;

class Articles
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    use \MainTraits\Datas;

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

        $this->setSelectedDatas(new Datas(), $select->getSelect());

        // dd($this->_datas);
    }

    private function setSelectedDatas(
        \MainLib\Datas $methods,
        \stdClass $selected
    ) : void
    {
        foreach ($selected as $k=>$select) {
            $methods->setConf('articles');

            $this->_datas->{'articles'}[] = $k;

            $this->_datas->{$k} = $this->findDatas(
                $methods, $select, $k, 'articles'
            );
        }
    }
}
