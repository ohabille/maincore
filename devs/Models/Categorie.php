<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Categorie
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct(
        array $params, array $args
    )
    {
        parent::__construct($params, $args);

        $search = Search::getInst(new Db('categories'));

        if ($search->searchInDb('titre', $args[$params['request']]))
            $this->_datas['categorie'] = $this->findDatasContent(
                'categorie', $search->getCurrent()['file']
            );
    }
}
