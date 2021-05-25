<?php

namespace WebModels;

use \Connecters\Db\DbConnecter as Db;

class Categorie
extends \Domain\MainModel
implements \DomainImplements\Models\ModelImplements
{
    public function __construct()
    {
        parent::__construct();

        $search = Db::getDbSearch('categories');

        if ($search->findEntry('title', $this->_params['categorie']))
            $this->_datas['categorie'] = $this->findDatasContent(
                'categorie',
                $search->getFindEntry()['file']
            );
    }
}
