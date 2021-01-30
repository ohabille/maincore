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
     * {
     *  "routes" : {
     *     "home" : {
     *         "request" : "home"
     *      },
     *      "article" : {
     *          "request" : "article"
     *          "slug" : ([_a-zA-Z0-9]+)
     *      }
     * }
     * Retourne les routes disponibles
     * @return stdClass
     */
    public function getRoutes() : \stdClass;
}
