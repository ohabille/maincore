<?php

namespace Domain;

use \Connectors\DatasReaderConnector as Datas,
    \Connectors\RoutesConnector as Routes;

abstract class MainConstructor
{
    use \DomainTraits\DatasConstructor;

    /**
     * @var array
     */
    protected $_params;
    /**
     * @var array
     */
    protected $_datas;
    protected static $methods;

    public function __construct(array $params, array $args)
    {
        $this->_params = $params;

        $this->_datas = $this->_params['datas'];

        self::$methods = Datas::getInst();

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
        foreach ($selected as $k=>$select) {
            self::$methods->setConf($name);

            $this->_datas[$name][] = $k;

            $this->_datas[$k] = $this->findDatas($select, $k, $name);
        }
    }

    public function getDatas() : array
    {
        return $this->_datas;
    }
}
