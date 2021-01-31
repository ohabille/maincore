<?php

namespace MainPorts\Requests;

interface RoutesImplement
{
    /**
     * Retourne le pattern de recherche des routes
     * ex : "(\\/([_\\-a-zA-Z0-9]+))"
     * @return string
     */
    public function getMatchPattern() : string;

    /**
     * ex :
     *  "home" : {
     *      "request" : "home"
     *  },
     *  "article" : {
     *      "request" : "article"
     *         "slug" : ([_a-zA-Z0-9]+)
     *  }
     * Retourne les routes disponibles
     * @return stdClass
     */
    public function getRoutes() : \stdClass;

    /**
     * Retourne la route par défaut
     * ex : home
     * @return string
     */
    public function getDefaultRoute() : string;

    /**
     * Retourne la route norFound
     * @return string [description]
     */
    public function getNotFound() : string;

    /**
     * Retourne la route courante
     * @return stdClass|bool
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
}
