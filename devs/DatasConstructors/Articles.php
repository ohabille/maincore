<?php

namespace User\DatasConstructors;

use \GrendelDb\Db,
    \MainLib\Pager,
    \GrendelDb\Select,
    \MainLib\Datas;

class Articles
extends \MainLib\MainConstructor
implements \MainPorts\Controllers\DatasImplements
{
    public function __construct(
        \MainPorts\Controllers\RequestImplements $request
    )
    {
        parent::__construct($request);

        $db = new Db('articles');

        $pager = new Pager(
            $db->getTotal(),
            $this->_ctrlConf->{'nbrPPage'},
            $request->getArgs()
        );

        $select = new select($db, $pager);

        $methods = new Datas();

        foreach ($select->getSelect() as $k=>$conf) {
            $methods->setConf('articles');

            $this->_datas->{'articles'}[] = $k;

            $this->_datas->{$k} = formatConf(
                array_merge(
                    $methods->getTime((int) $k),
                    $methods->getSections($conf->{'file'})
                )
            );

            $this->_datas->{$k}->{'titreurl'} = $conf->{'titreurl'};

            $methods->setConf('categorie');

            $this->_datas->{$k}->{'categorieid'} = $conf->{'categorie'};

            $this->_datas->{$k}->{'categorie'} = $methods->getsectioncontent(
                'name', $conf->{'categorie'}
            );

            $methods->setConf('member');

            $this->_datas->{$k}->{'memberid'} = $conf->{'memberid'};

            $this->_datas->{$k}->{'member'} = $methods->getsectioncontent(
                'name', $conf->{'memberid'}
            );
        }
    }
}
