<?php
/**
 * Point d'entrée de l'application
 * Gère l'autoloading avec Composer
 * Puis charge la bonne page
 */

define('__ROOT__', __DIR__);
require __ROOT__ . '/vendor/autoload.php';

$router = App\Router\Router::getInstance();
$router->init();
