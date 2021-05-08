<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Categorie
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $search = Search::getInst(new Db('categories'));

        if ($search->searchInDb('titre', $this->_params['categorie']))
            $this->_datas['categorie'] = $this->findDatasContent(
                'categorie', $search->getCurrent()['file']
            );
    }
}
