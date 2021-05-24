<?php

namespace DomainTraits\WebModels;

trait ModelMethods
{
    protected function findDatasContent(string $key, string $file) : array
    {
        self::$methods->setConf($key);

        return self::$methods->getSections($file);
    }

    protected function findDatas(
        array $select, string $name
    ) : array
    {
        return array_merge(
            self::$methods->getTime((int) $select['time']),
            self::$methods->getSections($select['file']),
            $this->getDatasproperties($select, $name),
        );
    }

    protected function getDatasproperties(array $conf, $confName) : array
    {
        $properties = [];

        foreach ($conf as $k=>$property) {
            self::$methods->setConf($confName);

            if (!in_array($k, self::$methods->getConf()['dataKeys'])) continue;

            $properties[$k.'url'] = $property;

            if (!self::$methods->isConf($k)) continue;

            self::$methods->setConf($k);

            $properties[$k] = self::$methods->getsectioncontent('name', $property);
        }

        return $properties;
    }
}
