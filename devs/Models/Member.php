<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Member
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct(
        array $params
    )
    {
        parent::__construct($params);

        $search = Search::getInst(new Db('members'));

        if ($search->searchInDb('titre', $params['member']))
            $this->_datas['member'] = $this->findDatasContent(
                'member', $search->getCurrent()['file']
            );
    }
}
