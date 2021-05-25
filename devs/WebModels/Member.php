<?php

namespace WebModels;

use \Connecters\Db\DbConnecter as Db;

class Member
extends \Domain\MainModel
implements \DomainImplements\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $search = Db::getDbSearch('members');

        if ($search->findEntry('title', $this->_params['member']))
            $this->_datas['member'] = $this->findDatasContent(
                'member',
                $search->getFindEntry()['file']
            );
    }
}
