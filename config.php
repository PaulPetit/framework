<?php

/**
 * Fichier de configuration chargé tout au long de l'application
 */

//Serveur local
return [
    //--- Database settings ---//
    'database.host' => 'localhost',
    'database.name' => 'ajax',
    'database.user' => 'root',
    'database.password' => '',

    //--- Twig Settings ---//
    'twig.path' => __ROOT__ . "/twig"
];


/*// Serveur distant
return [
    //--- Database settings ---//
    'database.host' => 'sqlprive-pc2372-001.privatesql',
    'database.name' => 'cefiidev718',
    'database.user' => 'cefiidev718',
    'database.password' => 'MsnR4u42',

    //--- Twig Settings ---//
    'twig.path' => __ROOT__ . "/twig"
];*/
