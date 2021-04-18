<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Article
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \DomainInterfaces\Controllers\RoutesImplements $params
    )
    {
        parent::__construct($params);

        $search = Search::getInstance(new Db('articles'));

        if ($search->searchInDb('titre', $this->_params->getArgs()[0])) {
            self::$methods->setConf('article');

            $this->_datas->{'article'} = $this->findDatas(
                $search->getCurrent(),
                $search->getKeyCurrent(),
                'article'
            );
        }
    }
}
