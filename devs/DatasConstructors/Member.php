<?php

namespace Constructors;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Member
extends \MainLib\MainConstructor
implements \MainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \MainInterfaces\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $search = Search::getInstance(new Db('members'));

        if ($search->searchInDb('titre', $request->getArgs()[0]))
            $this->_datas->{'member'} = $this->findDatasContent(
                'member', $search->getCurrent()->{'file'}
            );
    }
}
