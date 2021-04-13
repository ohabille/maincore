<?php

namespace DomainTraits;

trait DatasConstructor
{
    protected function findDatasContent(
        string $key,
        string $file
    ) : \stdClass
    {
        self::$methods->setConf($key);

        return formatConf(
            self::$methods->getSections($file)
        );
    }

    protected function findDatas(
        \stdClass $select,
        string $key,
        string $name
        ) : \stdClass
        {
            return formatConf(
                array_merge(
                    self::$methods->getTime((int) $key),
                    self::$methods->getSections($select->{'file'}),
                    $this->getDatasproperties($select, $name),
                    )
                );
            }

    protected function getDatasproperties(
        \stdClass $conf,
        $confName
    ) : array
    {
        $properties = [];

        foreach ($conf as $k=>$property) {
            self::$methods->setConf($confName);

            if (!in_array($k, self::$methods->getConf()->{'dataKeys'})) continue;

            $properties[$k.'url'] = $property;

            if (!self::$methods->isConf($k)) continue;

            self::$methods->setConf($k);

            $properties[$k] = self::$methods->getsectioncontent('name', $property);
        }

        return $properties;
    }
}
