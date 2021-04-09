<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \GrendelDb\Search,
    \MainLib\Datas;

class Article
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $search = new Search(new Db('articles'));

        if ($search->searchInDb('titreurl', $request->getArgs()[0]))
            $this->setDatas($search->getFind(), new Datas());

        // dd($this->_datas);
    }

    private function setDatas(
        \stdClass $search,
        \MainLib\Datas $methods
    ) : void
    {
        $methods->setConf('article');

        $datas = array_merge(
            $methods->getTime((int) key($search)),
            $methods->getSections(current($search)->{'file'})
        );

        // dd(formatConf($datas));

        foreach ($datas as $k=>$data) $this->_datas->{$k} = $data;

        $methods->setConf('categorie');

        $this->_datas->{'categorieid'} = current($search)->{'categorie'};

        $this->_datas->{'categorie'} = $methods->getsectioncontent(
            'name', current($search)->{'categorie'}
        );

        $methods->setConf('member');

        $this->_datas->{'memberid'} = current($search)->{'memberid'};

        $this->_datas->{'member'} = $methods->getsectioncontent(
            'name', current($search)->{'memberid'}
        );
    }
}
