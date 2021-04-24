<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search,
    \Connectors\RoutesConnector as Routes;

class Article
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(array $params, array $args)
    {
        parent::__construct($params, $args);

        $search = Search::getInstance(new Db('articles'));

        if ($search->searchInDb('titre', $args[$params['request']])) {
            self::$methods->setConf('article');

            $this->_datas['article'] = $this->findDatas(
                $search->getCurrent(),
                $search->getKeyCurrent(),
                'article'
            );
        }
    }
}
