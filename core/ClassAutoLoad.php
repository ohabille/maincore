<?php

class ClassAutoLoad
{
    /**
     * Le nom de la classe demandée
     * inclant le namespace
     * @var string
     */
    private $_className;
    /**
     * la configuration des namespace
     * @var array
     */
    private $_paths;
    /**
     * Le résultat de recherche du namespace
     * @var array
     */
    private $_match;
    /**
     * le chemin du fichier de la classe demandée
     * @var string
     */
    private $_class;

    public function __construct(string $className)
    {
        $this->formatClassPath($className);
        $this->setAutoLoadJson();
        $this->setDirClass();
        $this->setClassPath();
    }

    /**
     * Remplace les '\' du namespace par de '/'
     * @param string $className : la classe demandée
     */
    private function formatClassPath(string $className) : void
    {
        $this->_className = str_replace('\\', '/', $className);
    }

    /**
     * lit le fichier de conf json et le sauvegarde dans $_paths
     */
    private function setAutoLoadJson() : void
    {
        $this->_paths =  json_decode(
            file_get_contents(ROOTDIRS.'confs/classDirs.json'), true
        );
    }

    /**
     * Recherche la classe dans les namespaces pré-configurés
     */
    private function setDirClass() : void
    {
        preg_match(
            '#('.implode('|', $this->_paths['paths']).')\/#',
            $this->_className,
            $this->_match
        );
    }

    /**
     * Configure le chemin vers le fichier de la classe demandée
     */
    private function setClassPath() : void
    {
        if (!empty($this->_match)) $this->aliasToPath();
        else $this->_class = $this->_className;
    }

    /**
     * Remplace le namespace par le chemin correspondant
     */
    private function aliasToPath() : void
    {
        $this->_class = ROOTDIRS
            .str_replace(
                $this->_match[0],
                $this->_paths[$this->_match[1]],
                $this->_className
            ).'.php';
    }

    /**
     * Retourne le fichier de la classe demandée
     * @return string : Le chemin du fichier
     */
    public function getClassFile() : string
    {
        return $this->_class;
    }
}
