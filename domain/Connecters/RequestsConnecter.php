<?php

namespace Connecters;

use \DomainImplements\Connecters\SingleConnecterImplement,
    \DomainImplements\Requests\RequestsImplement,
    \Adapters\RequestsAdapter as Requests;

class RequestsConnecter
implements  SingleConnecterImplement,
            RequestsImplement
{
    use \DomainTraits\ConnectersInstance;

    /**
     * @var \Adapters\RequestsAdapter
     */
    private static $instance = null;

    private static function setInst() : void
    {
        if (is_null(self::$instance)) self::$instance = new Requests;
    }

    /**
     * Retourne la requète
     * @return string
     */
    public function getRequest() : string
    {
        return self::$instance->getRequest();
    }
}
