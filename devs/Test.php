<?php

namespace User;

class Test implements \MainPorts\SingleTonImplement
{
    use \MainTraits\Instance;

    /**
     * @var \MainPorts\SingleTonImplement
     */
    private static $instance;
    private static $conf;

    private function __construct()
    {
        self::$conf = getConf('articleConf');
    }

    public function getContent(string $file) : string
    {
        return file_get_contents(
            ROOTDIRS.self::$conf->{'dir'}.$file.self::$conf->{'ext'}
        );
    }

    public function getTime(int $time) : array
    {
        return $this->formatTime(getdate($time));
    }

    private function formatTime(array $time) : array
    {
        $date = [];

        foreach (self::$conf->{'time'} as $form)
            if (isset($time[$form])) $date[$form] = $time[$form];

        return $date;
    }

    public function getSections(string $content) : array
    {
        $mask = implode('|', self::$conf->{'balises'});
        $pattern = '#\[('.$mask.')\](.*)\[\/('.$mask.')\]#';

        if (0 === preg_match_all($pattern, $content, $matches))
            return (['texte'=>$content]);

        return array_combine($matches[1], $matches[2]);
    }
}
