<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Member
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\DatasImplements
{
    public function __construct(
        \DomainInterfaces\Controllers\RoutesImplements $params
    )
    {
        parent::__construct($params);

        $search = Search::getInstance(new Db('members'));

        if ($search->searchInDb('titre', $params->getArgs()[0]))
            $this->_datas->{'member'} = $this->findDatasContent(
                'member', $search->getCurrent()->{'file'}
            );
    }
}
