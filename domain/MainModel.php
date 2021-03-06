<?php

namespace Domain;

use \Adapters\DatasReaderAdapter as Datas,
    \Connecters\RoutesConnecter as Routes;

abstract class MainModel
implements  \DomainImplements\Models\ModelImplements
{
    use \DomainTraits\WebModels\ModelMethods;

    /**
     * @var array
     */
    protected $_params;
    /**
     * @var array
     */
    protected $_datas;
    /**
     * @var \DomainImplements\Adapters\DatasReaderAdapterImplement
     */
    protected static $methods;

    public function __construct()
    {
        $this->_params = Routes::getParams();

        $this->_datas = $this->_params['datas'];

        self::$methods = new Datas;

        $conf = self::$methods->getMainDatas();

        $this->_datas['host'] = $conf['host'];

        $this->_datas['pageTitle'] = $conf['mainTitle']
            .'-'.$this->_datas['pageTitle'];

        if (empty($this->_datas['title']))
            $this->_datas['title'] = $conf['mainTitle'];

        foreach (Routes::getRoutes() as $k=>$route) {
            if ($route['menu']) {
                $this->_datas['pageMenu'][] = 'menu'.ucfirst($k);

                $this->_datas['menu'.ucfirst($k)]['url'] = $route['url'];
                $this->_datas['menu'.ucfirst($k)]['name'] = $route['name'];
            }
        }
    }

    protected function setSelectedDatas(array $selected, string $name) : void
    {
        // dd($selected);
        foreach ($selected as $k=>$select) {
            self::$methods->setConf($name);

            $this->_datas[$name][] = $k;

            $this->_datas[$k] = $this->findDatas($select, $name);
        }
    }

    public function getDatas() : array
    {
        return $this->_datas;
    }
}
