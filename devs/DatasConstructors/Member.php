<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \GrendelDb\Search,
    \MainLib\Datas;

class Member
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $search = new Search(new Db('members'));

        if ($search->searchInDb('titreurl', $request->getArgs()[0]))
            $this->setDatas($search->getFind(), new Datas());

        // dd($this->_datas);
    }

    private function setDatas(
        \stdClass $search,
        \MainLib\Datas $methods
    ) : void
    {
        $methods->setConf('member');

        $datas = $methods->getSections(current($search)->{'file'});

        // dd(formatConf($datas));

        foreach ($datas as $k=>$data) $this->_datas->{$k} = $data;
    }
}
