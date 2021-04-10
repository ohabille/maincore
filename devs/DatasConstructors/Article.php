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
        $methods = new Datas;

        if ($search->searchInDb('titre', $request->getArgs()[0])) {
            $methods->setConf('article');

            $this->_datas->{'article'} = $this->findDatas(
                $methods,
                current($search->getFind()),
                key($search->getFind()),
                'article'
            );
        }

        // dd($this->_datas);
    }
}
