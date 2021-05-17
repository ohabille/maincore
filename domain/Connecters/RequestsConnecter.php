<?php

namespace Connecters;

use \DomainImplements\Connecters\RequestsConnecterImplement;

class RequestsConnecter
implements RequestsConnecterImplement
{
    use \DomainTraits\ConnectersInstance;

    /**
     * @var \Adapters\RequestsAdapter
     */
    private static $instance = null;
    /**
     * @var string
     */
    private static $class = "\Adapters\RequestsAdapter";

    /**
     * Retourne la requète
     * @return string
     */
    public static function getPage() : string
    {
        return self::getInst()->getRequest();
    }
}
