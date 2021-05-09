<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search,
    \Connectors\RoutesConnector as Routes;

class Article
extends \Domain\MainConstructor
implements \DomainInterfaces\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $search = Search::getInst(new Db('articles'));

        if ($search->searchInDb('titre', $this->_params['article'])) {
            self::$methods->setConf('article');

            $this->_datas['article'] = $this->findDatas(
                $search->getCurrent(),
                $search->getKeyCurrent(),
                'article'
            );
        }
    }
}
