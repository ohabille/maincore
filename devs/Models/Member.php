<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Member
extends \Domain\MainConstructor
implements \DomainInterfaces\Controllers\ModelImplements
{
    public function __construct(
        array $params, array $args
    )
    {
        parent::__construct($params, $args);

        $search = Search::getInst(new Db('members'));

        if ($search->searchInDb('titre', $args[$params['request']]))
            $this->_datas['member'] = $this->findDatasContent(
                'member', $search->getCurrent()['file']
            );
    }
}
