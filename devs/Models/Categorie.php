<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Categorie
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \DomainInterfaces\Controllers\RoutesImplements $params
    )
    {
        parent::__construct($params);

        $search = Search::getInstance(new Db('categories'));

        if ($search->searchInDb('titre', $params->getArgs()[0]))
            $this->_datas->{'categorie'} = $this->findDatasContent(
                'categorie', $search->getCurrent()->{'file'}
            );
    }
}
