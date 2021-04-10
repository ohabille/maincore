<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \GrendelDb\Search,
    \MainLib\Datas;

class Categorie
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    use \MainTraits\Datas;

    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $search = new Search(new Db('categories'));

        if ($search->searchInDb('titre', $request->getArgs()[0]))
            $this->_datas->{'categorie'} = $this->findDatasContent(
                new Datas(), 'categorie',
                current($search->getFind())->{'file'}
            );

        // dd($this->_datas);
    }
}
