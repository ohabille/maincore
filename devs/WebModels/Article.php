<?php

namespace WebModels;

use \Connecters\Db\DbConnecter as Db,
    \Connecters\RoutesConnecter as Routes;

class Article
extends \Domain\MainModel
implements \DomainImplements\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $search = Db::getDbSearch('articles');

        if ($search->findEntry(['title'=>$this->_params['article']])) {
            self::$methods->setConf('article');

            $this->_datas['article'] = $this->findDatas(
                $search->getFindEntry(),
                'article'
            );
        }
    }
}
