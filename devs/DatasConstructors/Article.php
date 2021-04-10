<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \GrendelDb\Search,
    \MainLib\Datas;

class Article
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    use \MainTraits\Datas;

    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $search = new Search(new Db('articles'));

        if ($search->searchInDb('titre', $request->getArgs()[0]))
            $this->setSelectedDatas(
                new Datas(),
                $search->getFind()
            );
        // dd($this->_datas);
    }

    private function setSelectedDatas(
        \MainLib\Datas $methods,
        \stdClass $select
    ) : void
    {
        $methods->setConf('article');

        $datas = array_merge(
            $methods->getTime((int) key($select)),
            $methods->getSections(current($select)->{'file'}),
            $this->getDatasproperties(current($select), $methods, 'article')
        );

        foreach ($datas as $k=>$data) $this->_datas->{$k} = $data;
    }
}
