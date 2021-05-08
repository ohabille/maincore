<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search,
    \Connectors\RoutesConnector as Routes;

class Article
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct(array $params)
    {
        parent::__construct($params);

        $search = Search::getInst(new Db('articles'));

        if ($search->searchInDb('titre', $params['article'])) {
            self::$methods->setConf('article');

            $this->_datas['article'] = $this->findDatas(
                $search->getCurrent(),
                $search->getKeyCurrent(),
                'article'
            );
        }
    }
}
