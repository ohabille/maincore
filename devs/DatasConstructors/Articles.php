<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \MainLib\Pager,
    \GrendelDb\Select,
    \User\Test as ArticleDatas;

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

        $methods = ArticleDatas::getInstance();

        foreach ($select->getSelect() as $k=>$dbData) {
            $this->_datas->{'articles'}[] = $k;
            $this->_datas->{$k} = json_decode(json_encode(
                array_merge(
                    $methods->getTime((int) $k),
                    $methods->getSections($methods->getContent($dbData->{'file'}))
                )
            ));
        }

        dd($this->_datas);
    }
}
