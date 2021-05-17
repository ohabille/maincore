<?php

namespace Connecters\Db;

class DbArticleConnecter extends DbAbstractConnecter
{
    public function __construct()
    {
        parent::__construct('articles');
    }
}
