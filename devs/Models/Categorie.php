<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Categorie
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \DomainInterfaces\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $search = Search::getInstance(new Db('categories'));

        if ($search->searchInDb('titre', $request->getArgs()[0]))
            $this->_datas->{'categorie'} = $this->findDatasContent(
                'categorie', $search->getCurrent()->{'file'}
            );
    }
}
