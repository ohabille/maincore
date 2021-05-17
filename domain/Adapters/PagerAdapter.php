<?php

namespace Adapters;

use \DomainImplements\Adapters\PagerAdapterImplement,
    \GrendelPager\Pager;

class PagerAdapter
{
    private $_pager;

    public static function getPager(int $total, int $limit, array $args)
    {
        return new Pager($total, $limit, $args);
    }
}
