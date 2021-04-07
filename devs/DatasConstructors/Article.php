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

        $article = new Search(new Db('articles'));

        if ($article->searchInDb('titreurl', $request->getArgs()[0]))
            $this->setDatas($article->getFind());

        // dd($this->_datas);
    }

    private function setDatas(\stdClass $article)
    {
        $methods = new Datas();

        $methods->setConf('article');

        $datas = array_merge(
            $methods->getTime((int) key($article)),
            $methods->getSections(
                $methods->getContent(current($article)->{'file'})
            )
        );

        foreach ($datas as $k=>$data) $this->_datas->{$k} = $data;

        $methods->setConf('author');

        $this->_datas->{'authorid'} = current($article)->{'authorid'};

        $this->_datas->{'author'} = $methods->getSections(
            $methods->getContent(current($article)->{'authorid'})
        )['name'];
    }
}
