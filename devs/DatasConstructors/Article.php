<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Article
extends \MainLib\MainConstructor
implements \MainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $search = Search::getInstance(new Db('articles'));

        if ($search->searchInDb('titre', $request->getArgs()[0])) {
            self::$methods->setConf('article');

            $this->_datas->{'article'} = $this->findDatas(
                current($search->getSelect()),
                key($search->getSelect()),
                'article'
            );
        }

        // dd($this->_datas);
    }
}
