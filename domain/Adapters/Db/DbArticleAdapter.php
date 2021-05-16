<?php

namespace Adapters\Db;

class DbArticleAdapter extends DbAbstractAdapter
{
    public function __construct()
    {
        parent::__construct('articles');
    }
}
