<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Categorie
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct(
        array $params
    )
    {
        parent::__construct($params);

        $search = Search::getInst(new Db('categories'));

        if ($search->searchInDb('titre', $params['categorie']))
            $this->_datas['categorie'] = $this->findDatasContent(
                'categorie', $search->getCurrent()['file']
            );
    }
}
