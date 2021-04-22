<?php

namespace DomainInterfaces\Routes;

interface RoutesImplement
{
    /**
     * Retourne les clefs de requète
     * @return array $_conf['keys']
     */
    public function getKeys() : array;
    /**
     * Retourne les noms des arguments des routes
     * @return array $_conf['args']
     */
    public function getArgs() : array;

    /**
     * Retourne le pattern de recherche des routes
     * @return string $_conf['pattern']
     */
    public function getMatchPattern() : string;

    /**
     * Retourne les routes disponibles
     * @return array $_routes
     */
    public function getRoutes() : array;

    /**
     * Retourne la route par défaut
     * @return string $_conf['default']
     */
    public function getDefaultRoute() : string;

    /**
     * Retourne la route courante
     * @return array|bool
     */
    public function getCurrentRoute();

    /**
     * Avance le pointeur dans la configuration des routes
     */
    public function nextRoute() : void;

    /**
     * Remet le pointeur au départ de la configuration des routes
     */
    public function resetRoutes() : void;

    /**
     * Retourne la route norFound
     * @return string $_conf['notFound']
     */
    public function getNotFound() : string;
}
