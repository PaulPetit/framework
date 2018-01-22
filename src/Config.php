<?php


namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{
    /**
     * @var array|mixed
     */
    private $settings = [];
    /**
     * @var null|Config
     */
    private static $instance = null;

    /**
     * Config constructor.
     * @param $configFile
     */
    private function __construct($configFile)
    {
        $this->settings = require $configFile;
    }

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self(__ROOT__ . '/config.php');
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}
