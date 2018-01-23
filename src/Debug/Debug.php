<?php

namespace App\Debug;

/**
 * Class Debug
 * @package App\Debug
 */
class Debug
{
    /**
     * Effectue un var_dump() de la variable
     * @param $var Variable à afficher
     */
    public static function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    /**
     * Effectue un var_dump() de la variable puis arrête le script
     * @param $var Variable à afficher
     */
    public static function dumpDie($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }

    /**
     * Affiche la variable dans la console du navigateur
     * @param $var Variable à afficher
     */
    public static function log($var)
    {
        echo "<script>console.log('{$var}')</script>";
    }
}
