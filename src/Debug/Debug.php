<?php

namespace App\Debug;

/**
 * Class Debug
 * @package App\Debug
 */
class Debug
{
    /**
     * @param $var
     */
    public static function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    /**
     * @param $var
     */
    public static function dumpDie($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }

    /**
     * @param $var
     */
    public static function print($var)
    {
        echo '<pre>';
        print_r($var, false);
        echo '</pre>';
    }

    /**
     * @param $var
     */
    public static function printDie($var)
    {
        echo '<pre>';
        print_r($var, false);
        echo '</pre>';
        die();
    }
}
