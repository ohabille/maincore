<?php

namespace MainTraits;

trait Datas
{
    private function findDatasContent(
        \MainLib\Datas $methods,
        string $key,
        string $file
    ) : \stdClass
    {
        $methods->setConf($key);

        // dd(formatConf($datas));

        return formatConf(
            $methods->getSections($file)
        );
    }

    private function findDataSection(
        \MainLib\Datas $methods,
        string $key,
        string $file,
        string $section
    ) : string
    {
        $methods->setConf($key);

        return $methods->getsectioncontent($section, $file);
    }

    private function getDatasproperties(
        \stdClass $conf,
        \MainLib\Datas $methods,
        $confName
    ) : array
    {
        $properties = [];

        foreach ($conf as $k=>$property) {
            $methods->setConf($confName);

            if (!in_array($k, $methods->getConf()->{'dataKeys'})) continue;

            $properties[$k.'url'] = $property;

            if (!$methods->isConf($k)) continue;

            $methods->setConf($k);

            $properties[$k] = $methods->getsectioncontent('name', $property);
        }

        return $properties;
    }
}
