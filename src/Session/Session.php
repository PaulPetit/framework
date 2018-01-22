<?php


namespace App\Session;

/**
 * Class Session
 * @package App\Session
 */
class Session
{
    /**
     * @var null|Session
     */
    private static $instance = null;

    /**
     * @return Session
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    /**
     * Session constructor.
     */
    private function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * Ajoute des messages flash dans la session
     * @param $key
     * @param $message
     */
    public function setFlash($key, $message)
    {
        $_SESSION['flash'][$key][] = $message;
    }

    /**
     * @return bool
     */
    public function hasFlashes()
    {
        return isset($_SESSION['flash']);
    }

    /**
     * Récupère les messages flash, puis les suppriment
     * @return null
     */
    public function getFlashes()
    {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }
        return null;
    }

    /**
     * Pour écrire directement dans la session
     * @param $key
     * @param $value
     */
    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Lit une clé dans la session
     * @param $key
     * @return null|mixed
     */
    public function read($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Supprime un clé dans la session
     * @param $key
     */
    public function delete($key)
    {
        unset($_SESSION[$key]);
    }
}
