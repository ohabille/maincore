<?php

namespace Constructors;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Categorie
extends \MainLib\MainConstructor
implements \MainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
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
