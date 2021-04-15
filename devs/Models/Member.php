<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Member
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \DomainInterfaces\Controllers\RequestImplements $request
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
