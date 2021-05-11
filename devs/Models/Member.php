<?php

namespace Models;

use \GrendelDb\Db,
    \GrendelDb\Search;

class Member
extends \Domain\MainModel
implements \DomainImplements\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $search = Search::getInst(new Db('members'));

        if ($search->searchInDb('titre', $this->_params['member']))
            $this->_datas['member'] = $this->findDatasContent(
                'member', $search->getCurrent()['file']
            );
    }
}
